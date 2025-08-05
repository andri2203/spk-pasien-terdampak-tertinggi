@extends('dashboard')

@section('content')

<div class="relative bg-white w-full overflow-x-auto shadow-md sm:rounded-lg">
    <div class="p-4 mb-2 flex flex-col gap-y-2 border-b border-gray-200">
        <h5 class="text-sm font-medium">Data Penyakit :</h5>
        <div class="flex gap-x-2">
            @foreach($penyakit as $data)
            @if($id_penyakit != null && $id_penyakit == $data['id'])
            <a href="/evaluasi-pasien/{{ $data['id'] }}" class="bg-green-100 hover:bg-green-200 text-green-800 text-xs font-semibold me-2 px-2.5 py-0.5 rounded-sm border border-green-400 inline-flex items-center justify-center">{{ $data['name'] }}</a>
            @else
            <a href="/evaluasi-pasien/{{ $data['id'] }}" class="bg-blue-100 hover:bg-blue-200 text-blue-800 text-xs font-semibold me-2 px-2.5 py-0.5 rounded-sm border border-blue-400 inline-flex items-center justify-center">{{ $data['name'] }}</a>
            @endif
            @endforeach
            @if($id_penyakit != null)
            <a href="/evaluasi-pasien" class="bg-red-100 hover:bg-red-200 text-red-800 text-xs font-semibold me-2 px-2.5 py-0.5 rounded-sm border border-red-400 inline-flex items-center justify-center">Kembali</a>
            @endif
        </div>
    </div>
    <table class="w-full text-sm text-left rtl:text-right text-gray-500">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50">
            <tr>
                <th scope="col" class="px-6 py-3">
                    Peringkat
                </th>
                <th scope="col" class="px-6 py-3">
                    Nama Pasien
                </th>
                <th scope="col" class="px-6 py-3">
                    Vektor S
                </th>
                <th scope="col" class="px-6 py-3">
                    Nilai Alternatif
                </th>
                <th scope="col" class="px-6 py-3">
                    Action
                </th>
            </tr>
        </thead>
        <tbody>
            @if($hasil != null)
            @foreach($hasil as $data)
            <tr class="bg-white border-b border-gray-200 hover:bg-gray-50">
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                    {{$data['ranking']}}
                </th>
                <td class="px-6 py-4">
                    {{$data['pasien']->name}}
                </td>
                <td class="px-6 py-4">
                    {{$data['nilai_s']}}
                </td>
                <td class="px-6 py-4">
                    {{$data['nilai_v']}}
                </td>
                <td class="px-6 py-4">
                    <button data-modal-target="popup-modal-{{$data['ranking']}}" data-modal-toggle="popup-modal-{{$data['ranking']}}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline" type="button">
                        Data keputusan
                    </button>

                    <div id="popup-modal-{{$data['ranking']}}" tabindex="-1" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                        <div class="relative bg-white w-full max-w-lg max-h-full">
                            <div class="flex justify-end w-full py-3 px-2.5 ">
                                <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="popup-modal-{{$data['ranking']}}">
                                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                    </svg>
                                    <span class="sr-only">Close modal</span>
                                </button>
                            </div>
                            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                    <tr>
                                        @foreach($kriteria as $kr)
                                        <th scope="col" class="text-center px-6 py-3">
                                            {{$kr['criteria']}}
                                        </th>
                                        @endforeach
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 border-gray-200">
                                        @foreach($kriteria as $kr)
                                        <th scope="row" class="text-center px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                            {{$data['nilai_keputusan'][$kr['id']] ?? "-"}}
                                        </th>
                                        @endforeach
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>

                </td>
            </tr>
            @endforeach
            @else
            <tr class="bg-white border-b border-gray-200 hover:bg-gray-50">
                <th colspan="5" class="px-6 py-4 font-bold text-center text-gray-800 bg-gray-300 whitespace-nowrap">
                    Mohon untuk memilih data Penyakit dahulu
                </th>
            </tr>
            @endif
        </tbody>
    </table>
</div>

@endsection
