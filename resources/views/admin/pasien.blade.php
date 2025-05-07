@extends('dashboard')

@section('content')

<div class="relative overflow-x-auto shadow-md sm:rounded-lg">
    <div class="px-6 py-3 bg-white">
        <a href="/pasien/tambah" class="text-white bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center me-2 shadow-md">

            <svg class="w-4 h-4 me-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 12h14m-7 7V5" />
            </svg>

            Tambah Pasien
        </a>

    </div>
    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">
                    Nama Pasien
                </th>
                <th scope="col" class="px-6 py-3">
                    Tanggal Lahir
                </th>
                <th scope="col" class="px-6 py-3">
                    No. HP
                </th>
                <th scope="col" class="px-6 py-3">
                    Alamat
                </th>
                <th scope="col" class="px-6 py-3">
                    Action
                </th>
            </tr>
        </thead>
        <tbody>
            @if(count($pasien)==0)
            <tr class="bg-gray-200 border-b dark:bg-gray-800 border-gray-200">
                <th scope="row" colspan="5" class="px-6 py-4 font-medium text-gray-700 whitespace-nowrap text-center">
                    Belum memiliki data pasien
                </th>
            </tr>
            @else
            @foreach($pasien as $data)
            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 border-gray-200 hover:bg-gray-50">
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                    {{ $data['name'] }}
                </th>
                <td class="px-6 py-4">
                    {{ $data['date_birth'] }}
                </td>
                <td class="px-6 py-4">
                    {{ $data['phone'] }}
                </td>
                <td class="px-6 py-4">
                    {{ $data['address'] }}
                </td>
                <td class="px-6 py-4">
                    <a href="/pasien/edit/{{ $data['id'] }}" class="font-medium text-blue-600 hover:underline me-2">Edit</a>

                    <button data-modal-target="popup-modal-{{ $data['id'] }}" data-modal-toggle="popup-modal-{{ $data['id'] }}" class="block font-medium text-red-600 hover:underline" type="button">
                        Hapus
                    </button>

                    <form action="/pasien/hapus/{{ $data['id'] }}" method="post" id="popup-modal-{{ $data['id'] }}" tabindex="-1" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                        @csrf
                        <div class="relative p-4 w-full max-w-md max-h-full">
                            <div class="relative bg-white rounded-lg shadow-sm dark:bg-gray-700">
                                <button type="button" class="absolute top-3 end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="popup-modal-{{ $data['id'] }}">
                                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                    </svg>
                                    <span class="sr-only">Close modal</span>
                                </button>
                                <div class="p-4 md:p-5 text-center">
                                    <svg class="mx-auto mb-4 text-gray-400 w-12 h-12 dark:text-gray-200" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                    </svg>
                                    <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">Apakah anda yakin ingin menghapus data "{{ $data['name'] }}"</h3>
                                    <button class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center">
                                        Ya, Hapus Sekarang
                                    </button>
                                    <button data-modal-hide="popup-modal-{{ $data['id'] }}" type="button" class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">Tidak, batalkan</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </td>
            </tr>
            @endforeach
            @endif
        </tbody>
    </table>
</div>

@endsection
