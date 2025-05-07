<?php

namespace App\Http\Controllers;

use App\Models\Disease;
use App\Models\DiseaseCriteria;
use App\Services\SPKService;

class EvaluasiController extends Controller
{
    public function index(?int $id_penyakit = null)
    {
        $penyakit = Disease::all(['id', 'name']);

        $data = [
            'title' => 'Evaluasi Pasien',
            'active' => '/evaluasi-pasien',
            'penyakit' => $penyakit,
            'kriteria' => [],
            'id_penyakit' => $id_penyakit,
            'hasil' => null
        ];

        if ($id_penyakit != null) {
            $spk_service = new SPKService();
            $data['hasil'] = $spk_service->data_pasien_terdampak($id_penyakit);
            $data['kriteria'] = DiseaseCriteria::where('disease_id', $id_penyakit)->get();
        }

        return view('admin.evaluasi_pasien', $data);
    }

    public function hasil()
    {
        $spk_service = new SPKService();
        $hasil = $spk_service->data_pasien_terdampak_untuk_semua_penyakit();

        dd(compact('hasil'));
    }
}
