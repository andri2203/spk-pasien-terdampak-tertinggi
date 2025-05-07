@extends('dashboard')

@section('content')
<a href="/kriteria-penyakit/tambah" class="text-white bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">Tambah Kriteria</a>

<div class="grid grid-cols-2 gap-4 w-full pt-4 border-t border-gray-200">
    @if(count($penyakit)==0)
    <div class="col-span-2 flex justify-center bg-gray-200 p-6 rounded-lg shadow-md">
        <p class="px-6 py-4 font-medium text-gray-700 whitespace-nowrap text-center">
            Belum memiliki data penyakit - <a href="/penyakit" class="text-blue-600 hover:underline me-2">Tambah Data Penyakit</a>
        </p>
    </div>
    @else
    @foreach($penyakit as $data)
    <div class="col-span-1 bg-white border border-gray-200 rounded-lg shadow-sm overflow-hidden">
        @csrf
        <div class="w-full inline-flex items-center justify-between p-4 border-b border-gray-200">
            <h5 class="mb-2 text-lg font-bold text-gray-900">
                Bobot Kriteria {{ $data['name'] }}
            </h5>

            <a href="/kriteria-penyakit/bobot-kriteria/{{ $data['id'] }}" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg px-3 py-2 text-sm mb-2 cursor-pointer">Proses Bobot Kriteria</a>
        </div>
        @if(count($data->kriteria_penyakit)==0)
        <div class="flex justify-center bg-gray-200 p-4 rounded-b-lg shadow-md">
            <p class="mb-2 font-medium text-gray-700">
                Belum memiliki data kriteria
            </p>
        </div>
        @else
        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            Kriteria
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Bobot
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($data->kriteria_penyakit as $data_kriteria)
                    <tr class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700 border-gray-200">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ $data_kriteria['criteria'] }}
                        </th>
                        <td class="px-6 py-4">
                            {{ $data_kriteria['weight'] }}

                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        @endif
    </div>
    @endforeach
    @endif
</div>
@endsection
