@extends('dashboard')

@section('content')
<section class="grid grid-cols-2 gap-4 w-full">
    @foreach($penyakit as $data)
    <div class="inline-flex items-center justify-between bg-white rounded-lg shadow-md">
        <p class="px-4 text-sm font-semibold leading-relaxed">Penyakit {{ $data['name'] }}</p>

        <div class="inline-flex rounded-md shadow-xs">
            <a href="/keputusan-pasien/tambah/{{ $data['id'] }}" class="px-4 py-2 text-sm font-medium text-gray-200 bg-green-700 rounded-s-lg hover:bg-green-800 hover:text-white">
                Tambah Nilai
            </a>
            <a href="/keputusan-pasien/{{ $data['id'] }}" class="px-4 py-2 text-sm font-medium text-gray-200 bg-blue-700 rounded-e-lg hover:bg-blue-800 hover:text-white">
                Lihat Nilai
            </a>
        </div>
    </div>
    @endforeach
</section>
@endsection
