<?php

namespace App\Http\Controllers;

use App\Models\Disease;
use Carbon\Carbon;
use Illuminate\Http\Request;

class PenyakitController extends Controller
{
    public function index()
    {
        $penyakit = Disease::orderBy('created_at', 'desc')->get();

        return view('admin.penyakit', [
            'title' => 'Data Penyakit',
            'active' => '/penyakit',
            'penyakit' => $penyakit,
        ]);
    }

    public function tambah()
    {
        return view('admin.tambah_penyakit', [
            'title' => 'Tambah Penyakit',
            'active' => '/penyakit',
        ]);
    }

    public function edit(int $id_penyakit)
    {
        $penyakit = Disease::where('id', $id_penyakit)->first();

        return view('admin.edit_penyakit', [
            'title' => 'Edit Penyakit',
            'active' => '/penyakit',
            'penyakit' => $penyakit,
        ]);
    }

    public function tambah_penyakit(Request $request)
    {
        $credentials = $request->validate([
            'name' => 'required',
            'description' => 'required',
        ]);

        if (!$credentials) {
            return back()->with('error', 'Mohon isi form terlebih dahulu');
        }

        try {

            Disease::create($credentials);

            return redirect('/penyakit')->with('success', 'Berhasil Menambahkan Penyakit "' . $credentials['name'] . '"');
        } catch (\Throwable $th) {
            return back()->with('error', $th->getMessage());
        }
    }

    public function edit_penyakit(Request $request, int $id_penyakit)
    {
        $credentials = $request->validate([
            'name' => 'required',
            'description' => 'required',
        ]);

        if (!$credentials) {
            return back()->with('error', 'Mohon isi form terlebih dahulu');
        }

        try {
            Disease::where('id', $id_penyakit)->update($credentials);

            return redirect('/penyakit')->with('success', 'Berhasil Mengubah Data Penyakit "' . $credentials['name'] . '"');
        } catch (\Throwable $th) {
            return back()->with('error', $th->getMessage());
        }
    }

    public function hapus_penyakit(int $id_penyakit)
    {
        try {
            Disease::destroy($id_penyakit);

            return redirect('/penyakit')->with('success', 'Berhasil Menghapus Data Penyakit');
        } catch (\Throwable $th) {
            return back()->with('error', $th->getMessage());
        }
    }
}
