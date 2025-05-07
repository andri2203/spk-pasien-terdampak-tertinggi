<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use Carbon\Carbon;
use Illuminate\Http\Request;

class PasienController extends Controller
{
    public function index()
    {
        $pasien = Patient::orderBy('created_at', 'desc')->get();

        return view('admin.pasien', [
            'title' => 'Data Pasien',
            'active' => '/pasien',
            'pasien' => $pasien,
        ]);
    }

    public function tambah()
    {
        return view('admin.tambah_pasien', [
            'title' => 'Tambah Pasien',
            'active' => '/pasien',
        ]);
    }

    public function edit(int $id_pasien)
    {
        $pasien = Patient::where('id', $id_pasien)->first();
        $pasien['date_birth'] = Carbon::createFromFormat('Y-m-d', $pasien['date_birth'])->format('m/d/Y');

        return view('admin.edit_pasien', [
            'title' => 'Edit Pasien',
            'active' => '/pasien',
            'pasien' => $pasien,
        ]);
    }

    public function tambah_pasien(Request $request)
    {
        $credentials = $request->validate([
            'name' => 'required',
            'date_birth' => 'required',
            'phone' => 'required',
            'address' => 'required',
        ]);

        if (!$credentials) {
            return back()->with('error', 'Mohon isi form terlebih dahulu');
        }

        try {
            $credentials['date_birth'] = Carbon::createFromFormat('m/d/Y', $credentials['date_birth'])->format('Y-m-d');

            Patient::create($credentials);

            return redirect('/pasien')->with('success', 'Berhasil Menambahkan Pasien "' . $credentials['name'] . '"');
        } catch (\Throwable $th) {
            return back()->with('error', $th->getMessage());
        }
    }

    public function edit_pasien(Request $request, int $id_pasien)
    {
        $credentials = $request->validate([
            'name' => 'required',
            'date_birth' => 'required',
            'phone' => 'required',
            'address' => 'required',
        ]);

        if (!$credentials) {
            return back()->with('error', 'Mohon isi form terlebih dahulu');
        }

        try {
            $credentials['date_birth'] = Carbon::createFromFormat('m/d/Y', $credentials['date_birth'])->format('Y-m-d');

            Patient::where('id', $id_pasien)->update($credentials);

            return redirect('/pasien')->with('success', 'Berhasil Mengubah Data Pasien "' . $credentials['name'] . '"');
        } catch (\Throwable $th) {
            return back()->with('error', $th->getMessage());
        }
    }

    public function hapus_pasien(int $id_pasien)
    {
        try {
            Patient::destroy($id_pasien);

            return redirect('/pasien')->with('success', 'Berhasil Menghapus Data Pasien');
        } catch (\Throwable $th) {
            return back()->with('error', $th->getMessage());
        }
    }
}
