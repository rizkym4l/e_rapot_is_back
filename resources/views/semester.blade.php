@extends('layouts.app')

@section('title', 'Pilih Semester')

@section('contents')
    <div class="container mx-auto px-4 py-8">
        <h1 class="text-4xl font-bold text-center mb-8 text-blue-600">Pilih Semester</h1>
        <div class="flex items-center mb-8">
            <button onclick="window.history.back()"
                class="btn bg-blue-500 text-white mx-2 sm:mx-0 border-blue-600 border-2 hover:bg-blue-600 hover:border-blue-700 mr-auto">Kembali</button>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
            <a href="/nama/{{ $tingkat }}/{{ $kelas }}/{{ $mapel }}/1"
                class="bg-white p-6 rounded-lg shadow-md hover:shadow-xl transition duration-300 ease-in-out transform hover:-translate-y-1 hover:scale-105">
                <div class="flex items-center justify-center mb-4">
                    <img src="https://via.placeholder.com/50" alt="Icon"
                        class="w-16 h-16 rounded-full border-2 border-blue-600">
                </div>
                <h2 class="text-2xl font-semibold text-center text-gray-800">Satu</h2>
            </a>
            <a href="/nama/{{ $tingkat }}/{{ $kelas }}/{{ $mapel }}/2"
                class="bg-white p-6 rounded-lg shadow-md hover:shadow-xl transition duration-300 ease-in-out transform hover:-translate-y-1 hover:scale-105">
                <div class="flex items-center justify-center mb-4">
                    <img src="https://via.placeholder.com/50" alt="Icon"
                        class="w-16 h-16 rounded-full border-2 border-blue-600">
                </div>
                <h2 class="text-2xl font-semibold text-center text-gray-800">Dua</h2>
            </a>
        </div>
    </div>
@endsection
