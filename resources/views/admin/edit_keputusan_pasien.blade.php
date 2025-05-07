@extends('dashboard')

@section('content')
<a href="/keputusan-pasien/{{ $penyakit['id'] }}" class="w-fit text-white bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mb-4 text-center inline-flex items-center me-2 shadow-md">
    Kembali
</a>
<form action="/keputusan-pasien/edit" method="post" class="flex flex-col w-full bg-white px-5 py-3.5 rounded-lg shadow-md border border-gray-200">
    @csrf
    <h5 class="text-lg font-bold leading-relaxed mb-2 text-center border-b border-gray-200">Nilai Keputusan Penyakit {{ $penyakit['name'] }}</h5>
    <div class="grid grid-cols-3 gap-x-2">
        <div class="col-span-2">
            <div class="mb-2">
                <label for="patient" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">{{ $pasien['name'] }}</label>
                <input type="hidden" id="patient" name="patient" value="{{ $pasien['id'] }}" />
            </div>
            <button class="text-white bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2 cursor-pointer">Edit Nilai Keputusan</button>
        </div>
        <div class="col-span-1 flex flex-col gap-y-2">
            @foreach($evaluations as $evaluation)
            <div>
                <label for="input-nilai-{{ $evaluation['id'] }}" class="block mb-2 text-sm font-medium text-gray-900">
                    {{ $evaluation->disease_criterias->criteria }}
                </label>
                <input type="number" id="input-nilai-{{ $evaluation['id'] }}" name="value[{{ $evaluation['id'] }}]" aria-describedby="helper-text-explanation" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="Nilai Kriteria" value="{{ old('value.' . $evaluation['id'])??$evaluation['value']}}" />
                @error('value.' . $evaluation['id'])
                <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium">{{ $message }}</p>
                @enderror
            </div>
            @endforeach
        </div>
    </div>
</form>
@endsection
