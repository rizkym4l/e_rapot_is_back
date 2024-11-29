@extends('layouts.app')

@section('title', 'Pilih Siswa')

@section('contents')
    <div class="container mx-auto px-4 py-8">
        <h1 class="text-4xl font-bold text-center mb-4 text-blue-600">Pilih Siswa</h1>


        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach ($siswa as $item)
                <a href="{{ route('guru.tampilkan_nilai', $item->nis) }}"
                    class="bg-white p-6 rounded-lg shadow-md hover:shadow-xl transition duration-300 ease-in-out transform hover:-translate-y-1 hover:scale-105">
                    <div class="flex items-center justify-center mb-4">
                        <img src="https://via.placeholder.com/50" alt="Icon"
                            class="w-16 h-16 rounded-full border-2 border-blue-600">
                    </div>
                    <h2 class="text-2xl font-semibold text-center text-gray-800">{{ $item->nama_lengkap }}</h2>
                    <p class="text-center text-gray-500">NIS: {{ $item->nis }}</p>
                </a>
            @endforeach
        </div>
    </div>
@endsection
