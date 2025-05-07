@extends('dashboard')

@section('content')
<a href="/kriteria-penyakit" class="w-fit text-white bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mb-4 text-center inline-flex items-center me-2 shadow-md">
    Kembali
</a>
<section class="w-full flex justify-center">
    <form action="/kriteria-penyakit/bobot-kriteria/{{ $penyakit['id'] }}" method="post" class="flex flex-col p-4 gap-4 w-4/5 bg-white rounded-lg shadow-md py-3">
        @csrf
        @foreach($penyakit->kriteria_penyakit as $data_kriteria)
        <div>
            <label for="number-input" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Bobot Kriteria <span class="font-bold">({{ $data_kriteria['criteria'] }})</span>:</label>
            <input type="number" id="number-input" name="weight[{{ $data_kriteria['id'] }}]" aria-describedby="helper-text-explanation" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                placeholder="Bobot Kriteria {{ $data_kriteria['criteria'] }}" value="{{ old('weight.' . $data_kriteria['id'])?? $data_kriteria['weight'] }}" />
            @error('weight.' . $data_kriteria['id'])
            <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium">{{ $message }}</p>
            @enderror
        </div>
        @endforeach
        <button type="submit" class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Tambah Bobot Kriteria</button>
    </form>
</section>
@endsection
