<?php

namespace App\Services;

use App\Models\Patient;
use App\Models\Disease;
use App\Models\DiseaseCriteria;
use Illuminate\Support\Collection;

class SPKService
{
    /**
     * Hitung SPK dengan metode Weighted Product
     */
    public function bobot_kriteria(int $id_penyakit): Collection
    {
        $penyakit = Disease::find($id_penyakit);

        $sum_bobot = $penyakit->kriteria_penyakit()->sum('weight');
        $bobot = $penyakit->kriteria_penyakit->mapWithKeys(function ($item) use ($sum_bobot) {
            return [$item->id => $item->weight / $sum_bobot];
        });

        return $bobot;
    }

    public function data_pasien_terdampak(int $id_penyakit)
    {
        $patients = Patient::with('evaluasi')->get();
        $criterias = DiseaseCriteria::where('disease_id', $id_penyakit)->get();
        $bobot = $this->bobot_kriteria($id_penyakit);
        $results = collect();

        foreach ($patients as $pasien) {
            $nilaiS = 1;
            $nilai_keputusan = [];

            foreach ($criterias as $criteria) {
                foreach ($pasien->evaluasi as $evaluasi) {
                    if ($criteria['id'] == $evaluasi->disease_criterias_id) {
                        $nilai_keputusan[$criteria['id']] = $evaluasi->value;
                        $nilai_bobot = $bobot[$evaluasi->disease_criterias_id] ?? 0;
                        $nilai = floatval($evaluasi->value);
                        $nilaiS *= pow($nilai, $nilai_bobot);
                    }
                }
            }


            $results->push([
                'pasien' => $pasien,
                'nilai_keputusan' => $nilai_keputusan,
                'nilai_s' => $nilaiS,
            ]);
        }

        $total_nilai_s = $results->sum('nilai_s');

        // Hitung nilai V dan ranking
        $ranked = $results->map(function ($item) use ($total_nilai_s) {
            $item['nilai_v'] = $item['nilai_s'] / $total_nilai_s;
            return $item;
        })->sortByDesc('nilai_v')->values();

        // Tambah ranking
        $ranked = $ranked->map(function ($item, $index) {
            $item['ranking'] = $index + 1;
            return $item;
        });

        return $ranked;
    }

    public function data_pasien_terdampak_untuk_semua_penyakit(): Collection
    {
        $diseases = Disease::with('kriteria_penyakit')->get();
        $patients = Patient::with('evaluasi')->get();
        $results = collect();

        foreach ($diseases as $disease) {
            $data_pasien_terdampak = collect();
            $sum_bobot = $disease->kriteria_penyakit()->sum('weight');
            $criterias = $disease->kriteria_penyakit;
            $bobot = $criterias->mapWithKeys(function ($item) use ($sum_bobot) {
                return [$item->id => $item->weight / $sum_bobot];
            });

            foreach ($patients as $pasien) {
                $nilaiS = 1;
                $nilai_keputusan = [];

                foreach ($criterias as $criteria) {
                    foreach ($pasien->evaluasi as $evaluasi) {
                        if ($criteria['id'] == $evaluasi->disease_criterias_id) {
                            $nilai_keputusan[$criteria['id']] = $evaluasi->value;
                            $nilai_bobot = $bobot[$evaluasi->disease_criterias_id] ?? 0;
                            $nilai = floatval($evaluasi->value);
                            $nilaiS *= pow($nilai, $nilai_bobot);
                        }
                    }
                }


                $data_pasien_terdampak->push([
                    'pasien' => $pasien,
                    'nilai_keputusan' => $nilai_keputusan,
                    'nilai_s' => $nilaiS,
                ]);
            }

            $total_nilai_s = $data_pasien_terdampak->sum('nilai_s');

            // Hitung nilai V dan ranking
            $ranked = $data_pasien_terdampak->map(function ($item) use ($total_nilai_s) {
                $item['nilai_v'] = $item['nilai_s'] / $total_nilai_s;
                return $item;
            })->sortByDesc('nilai_v')->values();

            // Tambah ranking
            $ranked = $ranked->map(function ($item, $index) {
                $item['ranking'] = $index + 1;
                return $item;
            });

            $results->push([
                'penyakit' => $disease,
                'ranked' => $ranked,
            ]);
        }


        return $results;
    }
}
