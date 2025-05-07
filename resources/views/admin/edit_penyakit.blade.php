@extends('dashboard')

@section('content')
<a href="/penyakit" class="w-fit text-white bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mb-4 text-center inline-flex items-center me-2 shadow-md">
    Kembali
</a>
<form action="/penyakit/edit/{{ $penyakit['id'] }}" method="post" class="grid grid-cols-3 gap-3 p-4 bg-white w-full shadow-md sm:rounded-lg">
    @csrf
    <div class="">
        <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama Penyakit</label>
        <input type="text" id="name" name="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 " placeholder="Asam Urat" value="{{ old('name')??$penyakit['name'] }}" />
        @error('name')
        <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium">{{ $message }}</p>
        @enderror
    </div>

    <div class="col-span-2">
        <label for="description" class="block mb-2 text-sm font-medium text-gray-900 ">Keterangan</label>
        <textarea id="description" name="description" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500" placeholder="Deskripsi dari Penyakit">{{ old('description')??$penyakit['description']  }}</textarea>
        @error('description')
        <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium">{{ $message }}</p>
        @enderror
    </div>

    <button type="submit" class="col-span-1 mt-7 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full h-fit px-5 py-2.5 text-center">
        Ubah Data Penyakit
    </button>
</form>


@endsection
