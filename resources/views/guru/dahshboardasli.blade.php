@extends('layouts.app')

@section('title', 'Dashboard Guru')

@section('contents')
    <div class="container mx-auto p-6">
        @if (session('success'))
            <div class="alert alert-success bg-green-200 my-8 p-4 rounded-lg">
                {{ session('success') }}
            </div>
        @endif

        <section>
            <div class="py-8 px-4 mx-auto max-w-screen-xl lg:py-16">
                <div class=" bg-white shadow-lg  border border-gray-200 rounded-lg p-8 md:p-12 mb-8">
                    <a href="#"
                        class="bg-blue-100 text-blue-800 text-xs font-medium inline-flex items-center px-2.5 py-0.5 rounded-md mb-2">
                        <svg class="w-3 h-3 mx-1 text-blue-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                            width="24" height="24" fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 21a9 9 0 1 0 0-18 9 9 0 0 0 0 18Z" />
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M17 13c0 2.038-2.239 4.5-5 4.5S7 15.038 7 13c0 1.444 10 1.444 10 0Z" />
                            <path fill="currentColor"
                                d="m9 6.811.618 1.253 1.382.2-1 .975.236 1.377L9 9.966l-1.236.65L8 9.239l-1-.975 1.382-.2L9 6.811Zm6 0 .618 1.253 1.382.2-1 .975.236 1.377L15 9.966l-1.236.65L14 9.239l-1-.975 1.382-.2L15 6.811Z" />
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                d="m9 6.811.618 1.253 1.382.2-1 .975.236 1.377L9 9.966l-1.236.65L8 9.239l-1-.975 1.382-.2L9 6.811Zm6 0 .618 1.253 1.382.2-1 .975.236 1.377L15 9.966l-1.236.65L14 9.239l-1-.975 1.382-.2L15 6.811Z" />
                        </svg>


                        Welcome
                    </a>
                    <h1 class="text-blue-500 text-3xl md:text-5xl font-extrabold mb-5">Selamat Datang ,
                        {{ $nama }}</h1>
                    <p class="text-lg font-normal text-gray-500 dark:text-gray-400 mb-8">Lorem ipsum, dolor sit amet
                        consectetur adipisicing elit. Omnis alias eaque debitis vel illo, repellat consequuntur cumque
                        quaerat voluptate? Hic minima accusamus placeat nesciunt iure, nam vel aliquid beatae unde.</p>
                    <a href="#overview"
                        class="inline-flex animate-bounce justify-center items-center py-2.5 px-5 text-base font-medium text-center text-white rounded-lg bg-blue-600 hover:bg-blue-700 focus:ring-4 focus:ring-blue-300 dark:focus:ring-blue-900">
                        Scroll
                        <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none"
                            viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 19V5m0 14-4-4m4 4 4-4" />
                        </svg>
                    </a>
                </div>


            </div>
        </section>

        <div class="relative mx-auto  bg-cover bg-center rounded-lg shadow-lg overflow-hidden max-w-screen-xl"
            style="background-image: url('https://o-cdn-cas.sirclocdn.com/parenting/images/Lingkungan_Sekolah_Al_Kahfi.width-800.format-webp.webp'); height: 300px;">
            <div class="absolute inset-0 bg-black bg-opacity-50 flex items-center justify-center">
                <h2 class="text-3xl text-white text-center font-semibold">Dashboard Overview</h2>
            </div>
        </div>

        <div class="mt-10 max-w-screen-xl mx-auto">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <a href="{{ route('tingkatan') }}"
                        class="block bg-blue-500 hover:-translate-y-3 text-white p-6 rounded-lg shadow-lg text-center hover:bg-blue-600 transition duration-300">
                        <h3 class="text-2xl font-bold mb-2">Input Nilai</h3>
                        <p>Masukkan nilai Siswa.</p>
                    </a>
                </div>
                <div>
                    <a href="{{ route('perbaikan') }}"
                        class="block bg-blue-500 hover:-translate-y-3 text-white p-6 rounded-lg shadow-lg text-center hover:bg-blue-600 transition duration-300">
                        <h3 class="text-2xl font-bold mb-2">Perbaikan Nilai</h3>
                        <p>Lakukan perbaikan nilai siswa.</p>
                    </a>
                </div>
            </div>
        </div>
    </div>


    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const scrollButton = document.getElementById('a[href="#overview"]');

            scrollButton.addEventListener('click', function(event) {
                event.preventDefault();
                document.querySelector('#overview').scrollIntoView({
                    behavior: 'smooth'
                });
            });
        });
    </script>
@endsection
