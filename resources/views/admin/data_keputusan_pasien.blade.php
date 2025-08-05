@extends('dashboard')

@section('content')
<a href="/keputusan-pasien" class="w-fit text-white bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mb-4 text-center inline-flex items-center me-2 shadow-md">
    Kembali
</a>

<div class="relative w-full overflow-x-auto shadow-md sm:rounded-lg">
    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">
                    Nama Pasien
                </th>
                @foreach($penyakit->kriteria_penyakit as $kriteria)
                <th scope="col" class="px-6 py-3">
                    {{ $kriteria['criteria'] }}
                </th>
                @endforeach
                <th scope="col" class="px-6 py-3">
                    Aksi
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach($evaluasi as $ev)
            <tr class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700 border-gray-200">
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    {{ $ev['patient'] }}
                </th>
                @foreach($penyakit->kriteria_penyakit as $kriteria)
                @if(count($ev['evaluations'])!=0)
                <td class="px-6 py-4">
                    {{ $ev['evaluations']['kriteria-' . $kriteria['id']] ?? "-" }}
                </td>
                @else
                <td class="px-6 py-4">
                    0
                </td>
                @endif
                @endforeach
                <td class="px-6 py-4">
                    @if(count($ev['evaluations'])!=0)
                    <a href="/keputusan-pasien/edit/{{ $ev['patient_id'] }}/{{ $penyakit['id'] }}" class="w-fit text-white bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center me-2 shadow-md">
                        Edit
                    </a>
                    @else
                    <a href="/keputusan-pasien/tambah/{{ $penyakit['id'] }}" class="w-fit text-white bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center me-2 shadow-md">
                        Edit
                    </a>
                    @endif
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection
