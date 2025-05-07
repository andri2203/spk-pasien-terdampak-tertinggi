@extends('dashboard')

@section('content')
<a href="/kriteria-penyakit" class="w-fit text-white bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mb-4 text-center inline-flex items-center me-2 shadow-md">
    Kembali
</a>
<section class="w-full flex justify-center">
    <form action="/kriteria-penyakit/tambah" method="post" class="flex flex-col p-4 gap-4 w-1/2 bg-white rounded-lg shadow-md py-3">
        @csrf
        <div>
            <label for="disease_id" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Pilih Penyakit</label>
            <select name="disease_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 ">
                <option value="" selected>Pilih Penyakit</option>
                @foreach($penyakit as $data)
                <option value="{{ $data['id'] }}">{{ $data['name'] }}</option>
                @endforeach
            </select>
            @error('disease_id')
            <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium">{{ $message }}</p>
            @enderror
        </div>
        <div>
            <label for="criteria" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Kriteria</label>
            <input type="text" name="criteria" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="Kriteria dari Penyakit" />
            @error('criteria')
            <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium">{{ $message }}</p>
            @enderror
        </div>
        <button type="submit" class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Tambah Kriteria</button>
    </form>
</section>
@endsection
