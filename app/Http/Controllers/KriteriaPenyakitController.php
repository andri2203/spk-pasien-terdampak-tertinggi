<?php

namespace App\Http\Controllers;

use App\Models\Disease;
use App\Models\DiseaseCriteria;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class KriteriaPenyakitController extends Controller
{

    protected int $weight_total = 100;

    public function index()
    {
        $penyakit = Disease::with('kriteria_penyakit')->get();

        return view('admin.kriteria_penyakit', [
            'title' => 'Data Kriteria Penyakit',
            'active' => '/kriteria-penyakit',
            'penyakit' => $penyakit,
        ]);
    }

    public function tambah()
    {
        $penyakit = Disease::orderBy('created_at')->get();

        return view('admin.tambah_kriteria_penyakit', [
            'title' => 'Tambah Kriteria Penyakit',
            'active' => '/kriteria-penyakit',
            'penyakit' => $penyakit,
        ]);
    }

    public function tambah_bobot_kriteria(int $id_penyakit)
    {
        $penyakit = Disease::where('id', $id_penyakit)->orderBy('created_at')->first();

        return view('admin.tambah_bobot_kriteria', [
            'title' => 'Tambah Bobot Kriteria (' . $penyakit['name'] . ')',
            'active' => '/kriteria-penyakit',
            'penyakit' => $penyakit,
        ]);
    }

    public function tambah_kriteria(Request $request)
    {
        $credentials = $request->validate([
            'criteria' => 'required',
            'disease_id' => 'required',
        ]);

        try {
            DiseaseCriteria::create([
                'criteria' => $credentials['criteria'],
                'weight' => 0,
                'disease_id' => $credentials['disease_id'],
            ]);

            return redirect('/kriteria-penyakit')->with('success', 'Berhasil menambahkan kriteria');
        } catch (\Throwable $th) {
            return back()->with('error', 'Terjadi kesalahan : ' . $th->getMessage());
        }
    }

    public function proses(Request $request, int $id_penyakit)
    {
        $input = $request->validate([
            'weight.*' => 'required'
        ]);

        $total_bobot = 0;

        foreach ($input['weight'] as $weight) {
            $total_bobot += $weight;
        }

        if ($total_bobot !== $this->weight_total) {
            return back()->with('error', 'Total bobot harus berjumlah ' . $this->weight_total)->withInput();
        }

        try {
            $result = [];
            $kriteria = DiseaseCriteria::where('disease_id', $id_penyakit)->orderBy('created_at')->get();

            foreach ($kriteria as $data_kriteria) {
                array_push($result, [
                    'id' => $data_kriteria['id'],
                    'weight' => $input['weight'][$data_kriteria['id']],
                ]);
            }

            $cases = '';
            $ids = [];

            foreach ($result as $item) {
                $id = (int) $item['id'];
                $weight = (float) $item['weight'];
                $cases .= "WHEN id = {$id} THEN {$weight} ";
                $ids[] = $id;
            }

            $idList = implode(',', $ids);
            $sql = "UPDATE disease_criterias SET weight = CASE {$cases} END WHERE id IN ({$idList})";

            DB::statement($sql);

            return redirect('/kriteria-penyakit')->with('success', 'Berhasil menambahkan bobot kriteria');
        } catch (\Throwable $th) {
            return back()->with('error', 'Terjadi kesalahan : ' . $th->getMessage());
        }
    }
}
