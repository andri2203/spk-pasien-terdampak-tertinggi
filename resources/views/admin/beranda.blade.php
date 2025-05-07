@extends('dashboard')

@section('content')
<section class="grid grid-cols-3 gap-3 w-full">
    <div class="col-span-1 flex flex-col items-start justify-start bg-green-200 border border-green-400 text-green-800 rounded-lg shadow-sm overflow-hidden">
        <h1 class="text-xl font-semibold my-4 px-4">Pasien</h1>
        <div class="inline-flex items-center gap-x-2.5 mb-4 px-4">
            <svg class="w-6 h-6 text-green-800" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                <path stroke="currentColor" stroke-linecap="round" stroke-width="2" d="M4.5 17H4a1 1 0 0 1-1-1 3 3 0 0 1 3-3h1m0-3.05A2.5 2.5 0 1 1 9 5.5M19.5 17h.5a1 1 0 0 0 1-1 3 3 0 0 0-3-3h-1m0-3.05a2.5 2.5 0 1 0-2-4.45m.5 13.5h-7a1 1 0 0 1-1-1 3 3 0 0 1 3-3h3a3 3 0 0 1 3 3 1 1 0 0 1-1 1Zm-1-9.5a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0Z" />
            </svg>
            <span class="font-medium">{{ $total_pasien }} Orang</span>
        </div>
        <a href="/pasien" class="inline-flex justify-between items-center w-full px-4 py-2.5 font-medium border-t border-green-400 hover:bg-green-400">
            Data Pasien
            <svg class="w-6 h-6 text-green-800" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 12H5m14 0-4 4m4-4-4-4" />
            </svg>
        </a>
    </div>
    <div class="col-span-2 grid grid-cols-2 gap-3">
        <a href="/penyakit" class="flex items-center p-2 rounded-lg bg-white border border-gray-200 shadow-sm group text-gray-800 hover:text-blue-800 hover:bg-blue-200 hover:border-blue-400">
            <svg class="w-6 h-6" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                <path d="M12 7.205c4.418 0 8-1.165 8-2.602C20 3.165 16.418 2 12 2S4 3.165 4 4.603c0 1.437 3.582 2.602 8 2.602ZM12 22c4.963 0 8-1.686 8-2.603v-4.404c-.052.032-.112.06-.165.09a7.75 7.75 0 0 1-.745.387c-.193.088-.394.173-.6.253-.063.024-.124.05-.189.073a18.934 18.934 0 0 1-6.3.998c-2.135.027-4.26-.31-6.3-.998-.065-.024-.126-.05-.189-.073a10.143 10.143 0 0 1-.852-.373 7.75 7.75 0 0 1-.493-.267c-.053-.03-.113-.058-.165-.09v4.404C4 20.315 7.037 22 12 22Zm7.09-13.928a9.91 9.91 0 0 1-.6.253c-.063.025-.124.05-.189.074a18.935 18.935 0 0 1-6.3.998c-2.135.027-4.26-.31-6.3-.998-.065-.024-.126-.05-.189-.074a10.163 10.163 0 0 1-.852-.372 7.816 7.816 0 0 1-.493-.268c-.055-.03-.115-.058-.167-.09V12c0 .917 3.037 2.603 8 2.603s8-1.686 8-2.603V7.596c-.052.031-.112.059-.165.09a7.816 7.816 0 0 1-.745.386Z" />
            </svg>

            <span class="ms-3">Data Penyakit</span>
        </a>
        <a href="/kriteria-penyakit" class="flex items-center p-2 rounded-lg bg-white border border-gray-200 shadow-sm group text-gray-800 hover:text-blue-800 hover:bg-blue-200 hover:border-blue-400">
            <svg class="w-6 h-6" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                <path d="M12 7.205c4.418 0 8-1.165 8-2.602C20 3.165 16.418 2 12 2S4 3.165 4 4.603c0 1.437 3.582 2.602 8 2.602ZM12 22c4.963 0 8-1.686 8-2.603v-4.404c-.052.032-.112.06-.165.09a7.75 7.75 0 0 1-.745.387c-.193.088-.394.173-.6.253-.063.024-.124.05-.189.073a18.934 18.934 0 0 1-6.3.998c-2.135.027-4.26-.31-6.3-.998-.065-.024-.126-.05-.189-.073a10.143 10.143 0 0 1-.852-.373 7.75 7.75 0 0 1-.493-.267c-.053-.03-.113-.058-.165-.09v4.404C4 20.315 7.037 22 12 22Zm7.09-13.928a9.91 9.91 0 0 1-.6.253c-.063.025-.124.05-.189.074a18.935 18.935 0 0 1-6.3.998c-2.135.027-4.26-.31-6.3-.998-.065-.024-.126-.05-.189-.074a10.163 10.163 0 0 1-.852-.372 7.816 7.816 0 0 1-.493-.268c-.055-.03-.115-.058-.167-.09V12c0 .917 3.037 2.603 8 2.603s8-1.686 8-2.603V7.596c-.052.031-.112.059-.165.09a7.816 7.816 0 0 1-.745.386Z" />
            </svg>

            <span class="ms-3">Data Kriteria Penyakit</span>
        </a>
        <a href="/keputusan-pasien" class="flex items-center p-2 rounded-lg bg-white border border-gray-200 shadow-sm group text-gray-800 hover:text-blue-800 hover:bg-blue-200 hover:border-blue-400">
            <svg class="w-6 h-6" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                <path d="M12 7.205c4.418 0 8-1.165 8-2.602C20 3.165 16.418 2 12 2S4 3.165 4 4.603c0 1.437 3.582 2.602 8 2.602ZM12 22c4.963 0 8-1.686 8-2.603v-4.404c-.052.032-.112.06-.165.09a7.75 7.75 0 0 1-.745.387c-.193.088-.394.173-.6.253-.063.024-.124.05-.189.073a18.934 18.934 0 0 1-6.3.998c-2.135.027-4.26-.31-6.3-.998-.065-.024-.126-.05-.189-.073a10.143 10.143 0 0 1-.852-.373 7.75 7.75 0 0 1-.493-.267c-.053-.03-.113-.058-.165-.09v4.404C4 20.315 7.037 22 12 22Zm7.09-13.928a9.91 9.91 0 0 1-.6.253c-.063.025-.124.05-.189.074a18.935 18.935 0 0 1-6.3.998c-2.135.027-4.26-.31-6.3-.998-.065-.024-.126-.05-.189-.074a10.163 10.163 0 0 1-.852-.372 7.816 7.816 0 0 1-.493-.268c-.055-.03-.115-.058-.167-.09V12c0 .917 3.037 2.603 8 2.603s8-1.686 8-2.603V7.596c-.052.031-.112.059-.165.09a7.816 7.816 0 0 1-.745.386Z" />
            </svg>

            <span class="ms-3">Data Keputusan Pasien</span>
        </a>
        <a href="/evaluasi-pasien" class="flex items-center p-2 rounded-lg bg-white border border-gray-200 shadow-sm group text-gray-800 hover:text-blue-800 hover:bg-blue-200 hover:border-blue-400">
            <svg class="w-6 h-6" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                <path fill-rule="evenodd" d="M2 6a2 2 0 0 1 2-2h16a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V6Zm2 8v-2h7v2H4Zm0 2v2h7v-2H4Zm9 2h7v-2h-7v2Zm7-4v-2h-7v2h7Z" clip-rule="evenodd" />
            </svg>

            <span class="ms-3">Data Evaluasi Pasien</span>
        </a>
    </div>

    <div id="data-terdampak" data-accordion="collapse" class="col-span-3 rounded-xl overflow-hidden">
        @foreach($data_terdampak_semua_penyakit as $index=>$dtsp)
        <h2 id="data-terdampak-heading-{{ $index }}">
            <button type="button" class="flex items-center justify-between w-full p-5 font-medium text-black bg-blue-200 border border-b-0 border-gray-200 focus:ring-4 focus:ring-gray-200 gap-3" data-accordion-target="#data-terdampak-body-{{ $index }}" aria-expanded="true" aria-controls="data-terdampak-body-{{ $index }}">
                <span>Peringkat Pasien Terdampak Penyakit {{ $dtsp['penyakit']->name }}</span>
                <svg data-accordion-icon class="w-3 h-3 rotate-180 shrink-0" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5 5 1 1 5" />
                </svg>
            </button>
        </h2>
        @php
        $hasil = $dtsp['ranked'];
        $kriteria = $criterias[$dtsp['penyakit']->id];
        @endphp
        <div id="data-terdampak-body-{{ $index }}" class="hidden" aria-labelledby="data-terdampak-heading-{{ $index }}">
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
                    @foreach($hasil as $i=>$data)
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
                            <button data-modal-target="popup-modal-{{ $index }}-{{$data['pasien']->id}}" data-modal-toggle="popup-modal-{{ $index }}-{{$data['pasien']->id}}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline" type="button">
                                Data keputusan
                            </button>

                            <div id="popup-modal-{{ $index }}-{{$data['pasien']->id}}" tabindex="-1" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                                <div class="relative bg-white w-full max-w-lg max-h-full">
                                    <div class="flex justify-end w-full py-3 px-2.5 ">
                                        <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="popup-modal-{{ $index }}-{{$data['pasien']->id}}">
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
                                                    {{$data['nilai_keputusan'][$kr['id']]}}
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
        @endforeach
    </div>
</section>
@endsection
