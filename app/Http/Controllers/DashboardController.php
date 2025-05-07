<?php

namespace App\Http\Controllers;

use App\Models\DiseaseCriteria;
use App\Models\Patient;
use App\Services\SPKService;

class DashboardController extends Controller
{
    public function index()
    {
        $total_pasien = Patient::count();
        $spk_service = new SPKService();
        $hasil = $spk_service->data_pasien_terdampak_untuk_semua_penyakit();
        $criterias = DiseaseCriteria::all();
        $criterias = $criterias->groupBy('disease_id');

        return view('admin.beranda', [
            'title' => 'Beranda',
            'active' => '/',
            'total_pasien' => $total_pasien,
            'data_terdampak_semua_penyakit' => $hasil,
            'criterias' => $criterias,
        ]);
    }
}
