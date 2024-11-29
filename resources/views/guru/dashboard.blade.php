@extends('layouts.app')

@section('title', 'Input Nilai Siswa')

@section('contents')
    <div class="container mx-auto px-4 py-8">
        <h2 class="text-3xl font-semibold mb-4 text-blue-700">Input Nilai Siswa</h2>

        <!-- Card Utama -->
        <div class="bg-white shadow-md rounded-lg p-6 my-10">
            <h2 class="text-xl font-semibold mb-2">Kelas: {{ $class->nama_kelas }} || Tingkat: {{ $tingkat }}</h2>
            <h2 class="text-xl font-semibold mb-4">Mapel: {{ $Mapel->nama }} || Semester: {{ $semester }}</h2>
            <h1 class="text-2xl font-semibold mb-4 text-blue-500 uppercase">{{ $nilai }}</h1>

            @if (session('error'))
                <div class="bg-red-100 text-red-700 p-4 rounded mb-6">
                    {{ session('error') }}
                </div>
            @elseif(session('success'))
                <div class="bg-green-100 text-green-700 p-4 rounded mb-6">
                    {{ session('success') }}
                </div>
            @endif

            <h2 class="text-2xl font-semibold mb-2 mt-5">Input Nilai Siswa</h2>
            <p class="mb-6">Silahkan Unduh Template <a href="{{ route('nilai.sport') }}" class="text-blue-600 underline">Di
                    Sini</a></p>
        </div>



        <div class="mb-6">
            <h2 class="text-2xl font-semibold mb-2 text-blue-700">Murid di Kelas Ini</h2>
        </div>

        <div class="bg-white shadow-md rounded-lg p-6 my-10">
            @if ($siswaCollection->isEmpty())
                <p class="text-lg font-medium text-red-600">Murid di kelas ini tidak tersedia.</p>
            @else
                <table class="min-w-full bg-white border border-gray-300">
                    <thead>
                        <tr>
                            <th class="px-4 py-2 border-b-2 border-gray-300 text-left">NIS</th>
                            <th class="px-4 py-2 border-b-2 border-gray-300 text-left">Nama Lengkap</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($siswaCollection as $siswaItem)
                            <tr>
                                <td class="px-4 py-2 border-b border-gray-300">{{ $siswaItem['nis'] }}</td>
                                <td class="px-4 py-2 border-b border-gray-300">{{ $siswaItem['nama_lengkap'] }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @endif
        </div>



        <div class="bg-white shadow-md rounded-lg p-6 my-10">
            <form
                action="{{ route('nilai.import', ['tingkat' => $tingkat, 'kelas' => $kelas, 'mapel' => $mapel, 'semester' => $semester, 'nilai' => $nilai1]) }}"
                method="POST" enctype="multipart/form-data">
                @csrf
                <div class="relative inline-block w-full mb-4">
                    <input
                        class="block w-full text-sm text-gray-500 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                        id="file_input" name="file" type="file">
                </div>
                <button
                    class="text-white my-10 bg-blue-700 hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300 font-medium rounded-full text-sm px-5 py-1.5 text-center"
                    type="submit">Import</button>
            </form>
        </div>


    </div>
@endsection
