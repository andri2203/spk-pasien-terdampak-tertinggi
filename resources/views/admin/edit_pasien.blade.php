@extends('dashboard')

@section('content')
<a href="/pasien" class="w-fit text-white bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mb-4 text-center inline-flex items-center me-2 shadow-md">
    Kembali
</a>
<form action="/pasien/edit/{{ $pasien['id'] }}" method="post" class="grid grid-cols-3 gap-3 p-4 bg-white w-full shadow-md sm:rounded-lg">
    @csrf
    <div class="">
        <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama Pasien</label>
        <input type="text" id="name" name="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 " placeholder="Jhon Doe" value="{{ old('name')??$pasien['name'] }}" />
        @error('name')
        <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium">{{ $message }}</p>
        @enderror
    </div>

    <div class="">
        <label for="date_birth" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tanggal Lahir</label>
        <div class="relative">
            <div class="absolute inset-y-0 start-0 flex items-center ps-3.5 pointer-events-none">
                <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z" />
                </svg>
            </div>
            <input datepicker id="date_birth" name="date_birth" type="text" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5" placeholder="mm/dd/yyyy" value="{{ old('date_birth')??$pasien['date_birth'] }}">
        </div>
        @error('date_birth')
        <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium">{{ $message }}</p>
        @enderror
    </div>

    <div class="">
        <label for="phone" class="block mb-2 text-sm font-medium text-gray-900 ">No. HP</label>
        <div class="relative">
            <div class="absolute inset-y-0 start-0 top-0 flex items-center ps-3.5 pointer-events-none">
                <svg class="w-4 h-4 text-gray-500 " aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 19 18">
                    <path d="M18 13.446a3.02 3.02 0 0 0-.946-1.985l-1.4-1.4a3.054 3.054 0 0 0-4.218 0l-.7.7a.983.983 0 0 1-1.39 0l-2.1-2.1a.983.983 0 0 1 0-1.389l.7-.7a2.98 2.98 0 0 0 0-4.217l-1.4-1.4a2.824 2.824 0 0 0-4.218 0c-3.619 3.619-3 8.229 1.752 12.979C6.785 16.639 9.45 18 11.912 18a7.175 7.175 0 0 0 5.139-2.325A2.9 2.9 0 0 0 18 13.446Z" />
                </svg>
            </div>
            <input type="text" id="phone" name="phone" aria-describedby="helper-text-explanation" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5" placeholder="123-456-7890" value="{{ old('phone')??$pasien['phone']  }}" />
        </div>
        @error('phone')
        <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium">{{ $message }}</p>
        @else
        <p id="helper-text-explanation" class="mt-2 text-sm text-gray-500 ">Select a phone number that matches the format.</p>
        @enderror
    </div>

    <div class="col-span-2">
        <label for="address" class="block mb-2 text-sm font-medium text-gray-900 ">Alamat</label>
        <textarea id="address" name="address" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500" placeholder="Jl.xxx, Desa/Kel.xxx Kec. xxx, Kota/Kab. xxx, xxx">{{ old('address')??$pasien['address']  }}</textarea>
        @error('address')
        <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium">{{ $message }}</p>
        @enderror
    </div>

    <button type="submit" class="col-span-1 mt-7 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full h-fit px-5 py-2.5 text-center">
        Ubah Data Pasien
    </button>
</form>


@endsection
