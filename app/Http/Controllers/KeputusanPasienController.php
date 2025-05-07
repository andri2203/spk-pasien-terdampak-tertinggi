<?php

namespace App\Http\Controllers;

use App\Models\Disease;
use App\Models\DiseaseCriteria;
use App\Models\Evaluation;
use App\Models\Patient;
use Illuminate\Http\Request;

class KeputusanPasienController extends Controller
{
    public function index(int $id_penyakit = 0)
    {
        $penyakit = Disease::orderBy('created_at', 'desc')->get();
        $data = [
            'title' => 'Data Keputusan Pasien',
            'active' => '/keputusan-pasien',
            'penyakit' => $penyakit,
            'evaluasi' => [],
        ];

        if ($id_penyakit != 0) {
            $evaluasi = [];
            $patients = Patient::orderBy('name', 'asc')->get();
            $evaluations = Evaluation::whereHas('disease_criterias', function ($query) use ($id_penyakit) {
                $query->where('disease_id', $id_penyakit);
            })->get();
            $kriteria = DiseaseCriteria::where('disease_id', $id_penyakit)->get();

            foreach ($patients as $patient) {
                $data = [];
                $data['patient'] = $patient['name'];
                $data['evaluations'] = [];

                foreach ($evaluations as $evaluation) {
                    if ($evaluation['patient_id'] == $patient['id']) {
                        array_push($data['evaluations'], [
                            'disease_criteria_id' => $evaluation['disease_criterias_id'],
                            'value' => $evaluation['value'],
                        ]);
                    }
                }

                array_push($evaluasi, $data);
            }

            dd($evaluasi);
        }

        return view('admin.keputusan_pasien', $data);
    }

    public function data_keputusan_pasien(int $id_penyakit)
    {
        $patients = Patient::orderBy('name', 'asc')->get();
        $penyakit = Disease::find($id_penyakit);
        $evaluations = Evaluation::whereHas('disease_criterias', function ($query) use ($id_penyakit) {
            $query->where('disease_id', $id_penyakit);
        })->get();

        $evaluasi = [];

        foreach ($patients as $patient) {
            $data = [];
            $data['patient_id'] = $patient['id'];
            $data['patient'] = $patient['name'];
            $data['evaluations'] = [];

            foreach ($evaluations as $evaluation) {
                if ($evaluation['patient_id'] == $patient['id']) {
                    $data['evaluations']['kriteria-' . $evaluation['disease_criterias_id']] = $evaluation['value'];
                    $data['evaluations']['kriteria-' . $evaluation['disease_criterias_id']] = $evaluation['value'];
                }
            }

            array_push($evaluasi, $data);
        }

        return view('admin.data_keputusan_pasien', [
            'title' => 'Data Nilai Keputusan Pasien (Penyakit ' . $penyakit['name'] . ')',
            'active' => '/keputusan-pasien',
            'penyakit' => $penyakit,
            'evaluasi' => $evaluasi,
        ]);
    }

    public function tambah(int $id_penyakit)
    {
        $pasien = Patient::orderBy('name', 'asc')->get();
        $kriteria = DiseaseCriteria::where('disease_id', $id_penyakit)->get();
        $penyakit = Disease::where('id', $id_penyakit)->first();

        return view('admin.tambah_keputusan_pasien', [
            'title' => 'Tambah Keputusan Pasien',
            'active' => '/keputusan-pasien',
            'penyakit' => $penyakit,
            'kriteria' => $kriteria,
            'pasien' => $pasien,
        ]);
    }

    public function edit(int $id_pasien, int $id_penyakit)
    {
        $pasien = Patient::where('id', $id_pasien)->first();
        $penyakit = Disease::where('id', $id_penyakit)->first();
        $evaluations = Evaluation::whereHas('disease_criterias', function ($query) use ($id_penyakit) {
            $query->where('disease_id', $id_penyakit);
        })->where('patient_id', $id_pasien)->get();

        return view('admin.edit_keputusan_pasien', [
            'title' => 'Edit Keputusan Pasien',
            'active' => '/keputusan-pasien',
            'penyakit' => $penyakit,
            'pasien' => $pasien,
            'evaluations' => $evaluations,
        ]);
    }

    public function tambah_nilai_keputusan(Request $request)
    {
        $input = $request->validate([
            'patient' => 'required',
            'value.*' => 'required',
        ]);

        $save = [];

        foreach ($input['value'] as $key => $value) {
            $exists = Evaluation::where('patient_id', $input['patient'])
                ->where('disease_criterias_id', $key)
                ->exists();

            if (!$exists) {
                $save[] = [
                    'patient_id' => $input['patient'],
                    'disease_criterias_id' => $key,
                    'value' => $value,
                ];
            }
        }

        if (empty($save)) {
            return back()->with('error', 'Data sudah pernah disimpan sebelumnya')->withInput();
        }

        try {
            Evaluation::insert($save);
            return redirect('/keputusan-pasien')->with('success', 'Berhasil menambahkan nilai keputusan pasien');
        } catch (\Throwable $th) {
            return back()->with('error', 'Terjadi Kesalahan : ' . $th->getMessage())->withInput();
        }
    }

    public function edit_nilai_keputusan(Request $request)
    {
        $input = $request->validate([
            'value.*' => 'required',
        ]);

        try {

            foreach ($input['value'] as $id => $value) {
                Evaluation::where('id', $id)->update(['value' => $value]);
            }

            return redirect('/keputusan-pasien')->with('success', 'Berhasil mengubah nilai keputusan pasien');
        } catch (\Throwable $th) {
            return back()->with('error', 'Terjadi Kesalahan : ' . $th->getMessage())->withInput();
        }
    }
}
