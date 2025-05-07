@extends('template')

@section('title', 'Login')

@section('body')
<main class="flex flex-col w-screen h-screen justify-center items-center">
    <h1 class="text-2xl font-bold mb-0.5 uppercase">SPK Web App</h1>
    <h1 class="text-sm font-light mb-2 italic">Masukkan Email & Password</h1>
    <form action="/login" method="post" class="flex flex-col p-6 w-1/3 rounded-md border border-gray-300">
        @session('error')
        <div class="p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50" role="alert">
            <span class="font-medium"> {{ $value }}
        </div>
        @endsession
        @csrf
        <div class="mb-4">
            <label for=" email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email</label>
            <input type="text" id="email" name="email" class="@error('email') bg-red-50 border border-red-300 text-red-900 text-sm rounded-lg focus:ring-red-500 focus:border-red-500 block w-full p-2.5 @else bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 @enderror" placeholder="email@example.com" value="{{ old('email') }}" />
            @error('email')
            <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium">{{ $message }}</p>
            @enderror
        </div>
        <div class="mb-4">
            <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Password</label>
            <input type="password" id="password" name="password" class="@error('password') bg-red-50 border border-red-300 text-red-900 text-sm rounded-lg focus:ring-red-500 focus:border-red-500 block w-full p-2.5 @else bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 @enderror" placeholder="•••••••••" />
            @error('password')
            <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium"> {{ $message }}</p>
            @enderror
        </div>
        <button class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 ">
            Masuk
        </button>
    </form>
</main>
@endsection
