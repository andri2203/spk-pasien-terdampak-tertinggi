@extends('dashboard')

@section('content')
<div class="inline-flex gap-x-2">
    <a href="/keputusan-pasien" class="w-fit text-white bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mb-4 text-center inline-flex items-center me-2 shadow-md">
        Kembali
    </a>
    <a href="/keputusan-pasien/{{ $penyakit['id'] }}" class="w-fit text-white bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mb-4 text-center inline-flex items-center me-2 shadow-md">
        Lihat Nilai Keputusan Penyakit {{ $penyakit['name'] }}
    </a>
</div>
<form action="/keputusan-pasien/tambah" method="post" class="flex flex-col w-full bg-white px-5 py-3.5 rounded-lg shadow-md border border-gray-200">
    @csrf
    <h5 class="text-lg font-bold leading-relaxed mb-2 text-center border-b border-gray-200">Nilai Keputusan Penyakit {{ $penyakit['name'] }}</h5>
    <div class="grid grid-cols-3 gap-x-2">
        <div class="col-span-2">
            <div class="mb-2">
                <label for="underline_select" class="sr-only">Data Pasien</label>
                <select id="underline_select" name="patient" class="block py-2.5 px-0 w-full text-sm text-gray-500 bg-transparent border-0 border-b-2 border-gray-200 appearance-none dark:text-gray-400 dark:border-gray-700 focus:outline-none focus:ring-0 focus:border-gray-200 peer">
                    <option value="" {{ old('patient') == null ? 'selected' : '' }}>Pilih Pasien</option>
                    @foreach($pasien as $ps)
                    <option value="{{ $ps['id'] }}" {{ old('patient') == $ps['id'] ? 'selected' : '' }}>{{ $ps['name'] }}</option>
                    @endforeach
                </select>
                @error('patient')
                <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium">{{ $message }}</p>
                @enderror
            </div>
            <button class="text-white bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2 cursor-pointer">Tambah Nilai Keputusan</button>
        </div>
        <div class="col-span-1 flex flex-col gap-y-2">
            @foreach($kriteria as $data)
            <div>
                <label for="input-nilai-{{ $data['id'] }}" class="block mb-2 text-sm font-medium text-gray-900">
                    {{ $data['criteria'] }}
                </label>
                <input type="number" id="input-nilai-{{ $data['id'] }}" name="value[{{ $data['id'] }}]" aria-describedby="helper-text-explanation" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="Nilai Kriteria" value="{{ old('value.' . $data['id']) }}" />
                @error('value.' . $data['id'])
                <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium">{{ $message }}</p>
                @enderror
            </div>
            @endforeach
        </div>
    </div>
</form>
@endsection
