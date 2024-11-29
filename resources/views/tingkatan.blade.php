@extends('layouts.app')

@section('title', 'Pilih Tingkatan')

@section('contents')

    <div class="container mx-auto px-4 py-8 h-full ">
        <h1 class="text-4xl font-bold text-center mb-8 text-blue-600">Pilih Tingkatan</h1>
        <p class=" text-center">Ayo Ustadz/Ustadzah Silahkan pilih Tingkatan</p>
        <div class="grid grid-cols-1 sm:grid-cols-2 ">
            <div class="1">
                <div class="grid grid-cols-1 sm:grid-cols-1 gap-6 my-4">
                    <a href="/kelas/1"
                        class="bg-white text-slate-600 p-6 rounded-lg shadow-md hover:shadow-lg transition duration-300 ease-in-out">
                        <div class="flex items-center justify-center mb-4">
                            <img src="{{ asset('assets/number-one.png') }}" alt="Icon"
                                class="w-14 h-14 rounded-full border-2 border-blue-600">
                        </div>
                        <h2 class="text-xl font-semibold text-center">Tingkatan 1</h2>
                    </a>
                </div>
                <div class="grid grid-cols-1 sm:grid-cols-1 gap-6 my-4">
                    <a href="/kelas/2"
                        class="bg-white text-slate-600 p-6 rounded-lg shadow-md hover:shadow-lg transition duration-300 ease-in-out">
                        <div class="flex items-center justify-center mb-4">
                            <img src="{{ asset('assets/2.png') }}" alt="Icon"
                                class="w-14 h-14 rounded-full border-2 border-blue-600">
                        </div>
                        <h2 class="text-xl font-semibold text-center">Tingkatan 1</h2>
                    </a>
                </div>
                <div class="grid grid-cols-1 sm:grid-cols-1 gap-6 my-4">
                    <a href="/kelas/3"
                        class="bg-white text-slate-600 p-6 rounded-lg shadow-md hover:shadow-lg transition duration-300 ease-in-out">
                        <div class="flex items-center justify-center mb-4">
                            <img src="{{ asset('assets/number-3.png') }}" alt="Icon"
                                class="w-14 h-14 rounded-full border-2 border-blue-600  ">
                        </div>
                        <h2 class="text-xl font-semibold text-center">Tingkatan 1</h2>
                    </a>
                </div>
            </div>
            <div class="2 p-4 rounded-lg hidden sm:block   ">
                <div
                    class="bg-gradient-to-r from-slate-100  border-2 group to-white p-6 rounded-lg shadow-md h-full flex flex-col items-center justify-center transform transition-all duration-300 hover:shadow-xl">
                    {{-- <p class="text-lg font-bold text-gray-600 mb-4 text-center">Ahlan wa sahlan ustadz dan ustadzah! --}}
                    {{-- Silahkan pilih tingkat!</p> --}}
                    <img src="{{ asset('assets/sap.png') }}" alt="Welcome Image" class="w-2/3  ">
                </div>
            </div>
        </div>

    </div>
@endsection
