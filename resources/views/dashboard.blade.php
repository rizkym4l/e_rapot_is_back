@extends('layouts.app')

@section('title', 'Dashboard')

@section('contents')

    <div class="container mx-auto p-6">
        @if (session('success'))
            <div class="alert alert-success bg-green-200 my-8">
                {{ session('success') }}
            </div>
        @endif

        <section class="flex flex-col lg:flex-row gap-8 max-w-screen-xl mx-auto">
            <div class="bg-white shadow-lg border border-gray-200 rounded-lg p-8 md:p-12 flex-1">
                <a href="#"
                    class="bg-blue-100 text-blue-800 text-xs font-medium inline-flex items-center px-2.5 py-0.5 rounded-md mb-2">
                    <svg class="w-3 h-3 mx-1 text-blue-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24"
                        height="24" fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 21a9 9 0 1 0 0-18 9 9 0 0 0 0 18Z" />
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M17 13c0 2.038-2.239 4.5-5 4.5S7 15.038 7 13c0 1.444 10 1.444 10 0Z" />
                        <path fill="currentColor"
                            d="m9 6.811.618 1.253 1.382.2-1 .975.236 1.377L9 9.966l-1.236.65L8 9.239l-1-.975 1.382-.2L9 6.811Zm6 0 .618 1.253 1.382.2-1 .975.236 1.377L15 9.966l-1.236.65L14 9.239l-1-.975 1.382-.2L15 6.811Z" />
                    </svg>
                    Welcome
                </a>
                <h1 class="text-blue-500 text-3xl md:text-5xl font-extrabold mb-5">Selamat Datang,
                    {{ $nama }}
                </h1>


                <p class="text-lg font-normal text-gray-500 dark:text-gray-400 mb-8">Lorem ipsum, dolor sit amet consectetur
                    adipisicing elit. Omnis alias eaque debitis vel illo, repellat consequuntur cumque quaerat voluptate?
                    Hic minima accusamus placeat nesciunt iure, nam vel aliquid beatae unde.</p>
                <a href="#overview"
                    class="inline-flex animate-bounce justify-center items-center py-2.5 px-5 text-base font-medium text-center text-white rounded-lg bg-blue-600 hover:bg-blue-700 focus:ring-4 focus:ring-blue-300 dark:focus:ring-blue-900">
                    Scroll
                    <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                        width="24" height="24" fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 19V5m0 14-4-4m4 4 4-4" />
                    </svg>
                </a>
            </div>

        </section>
        <div id="overview"
            class="relative bg-cover bg-center rounded-lg shadow-lg overflow-hidden my-10 max-w-screen-xl mx-auto "
            style="height: 300px;">
            <div class="absolute inset-0 w-full h-full">
                <iframe class="w-full h-full"
                    src="https://www.youtube.com/embed/ZiI_Dmw_HlU?autoplay=1&mute=1&loop=1&playlist=ZiI_Dmw_HlU"
                    frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
            </div>
            <div class="absolute inset-0 bg-black bg-opacity-50 flex items-center justify-center">
                <h2 class="text-3xl text-white text-center font-semibold">Overview</h2>
            </div>
        </div>

        <div class="mt-10 bg-white p-6 rounded-lg shadow-lg overflow-x-auto max-w-screen-xl mx-auto">
            <table class="table-auto w-full text-left bg-white text-gray-800">
                <thead>
                    <tr class="bg-blue-200 text-gray-600 uppercase text-sm leading-normal">
                        <th class="py-3 px-6 whitespace-nowrap">Tingkat</th>
                        <th class="py-3 px-6 whitespace-nowrap">Semester 1</th>
                        <th class="py-3 px-6 whitespace-nowrap">Semester 2</th>
                    </tr>
                </thead>
                <tbody class="text-gray-600 text-sm font-light">
                    <tr class="border-b border-gray-200 hover:bg-gray-100">
                        <td class="py-3 px-6 whitespace-nowrap">1</td>
                        <td class="py-3 px-6 whitespace-nowrap"><a href="nilai/siswa/1/1"><button
                                    class="btn bg-blue-500 border-none text-white">Buka</button></a></td>
                        <td class="py-3 px-6 whitespace-nowrap"><a href="nilai/siswa/1/2"><button
                                    class="btn bg-blue-500 border-none text-white">Buka</button></a></td>
                    </tr>
                    <tr class="border-b border-gray-200 hover:bg-gray-100">
                        <td class="py-3 px-6 whitespace-nowrap">2</td>
                        <td class="py-3 px-6 whitespace-nowrap"><a href="nilai/siswa/2/1"><button
                                    class="btn bg-blue-500 border-none text-white">Buka</button></a></td>
                        <td class="py-3 px-6 whitespace-nowrap"><a href="nilai/siswa/2/2"><button
                                    class="btn bg-blue-500 border-none text-white">Buka</button></a></td>
                    </tr>
                    <tr class="border-b border-gray-200 hover:bg-gray-100">
                        <td class="py-3 px-6 whitespace-nowrap">3</td>
                        <td class="py-3 px-6 whitespace-nowrap"><a href="nilai/siswa/3/1"><button
                                    class="btn bg-blue-500 border-none text-white">Buka</button></a></td>
                        <td class="py-3 px-6 whitespace-nowrap"><a href="nilai/siswa/3/2"><button
                                    class="btn bg-blue-500 border-none text-white">Buka</button></a></td>
                    </tr>
                </tbody>
            </table>
        </div>

        {{-- Section untuk nilai history --}}
        {{-- <div class="mt-10 bg-white p-6 rounded-lg shadow-lg overflow-hidden max-w-screen-xl mx-auto">
            <h3 class="text-2xl font-bold text-gray-800 mb-4">History Nilai</h3>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach ($nilaiHistory as $nilai)
                    <div class="bg-blue-100 border-l-4 border-blue-500 p-4 rounded-lg shadow">
                        <div class="flex justify-between items-center mb-2">
                            <h4 class="text-lg font-semibold">{{ $nilai->mata_pelajaran }}</h4>
                            <span class="text-sm text-gray-600">{{ $nilai->tanggal }}</span>
                        </div>
                        <p class="text-gray-700">Nilai: <span class="font-bold">{{ $nilai->nilai }}</span></p>
                        <p class="text-gray-500 text-sm">Tingkat: {{ $nilai->tingkat }} | Semester: {{ $nilai->semester }}
                        </p>
                    </div>
                @endforeach
            </div>
        </div> --}}
    </div>

@endsection
