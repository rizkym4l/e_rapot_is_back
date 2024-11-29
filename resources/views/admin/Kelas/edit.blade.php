@extends('layouts.main')

@section('contentAdmin')
    <div class="min-h-screen bg-slate-900 p-6">
        <div class="container mx-auto space-y-6">
            <!-- Header -->
            <div class="bg-slate-800/50 backdrop-blur-xl border border-slate-700 p-6 rounded-xl shadow-xl">
                <div class="flex items-center gap-4">
                    <div class="p-3 rounded-xl bg-cyan-900/50 border border-cyan-700/50 text-cyan-400">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" viewBox="0 0 20 20" fill="currentColor">
                            <path
                                d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z" />
                        </svg>
                    </div>
                    <div>
                        <h1
                            class="text-2xl font-bold bg-gradient-to-r from-cyan-400 to-blue-400 bg-clip-text text-transparent">
                            Formulir Kelas
                        </h1>
                        <p class="text-slate-400">{{ isset($kelas) ? 'Edit kelas yang ada' : 'Tambah kelas baru' }}</p>
                    </div>
                </div>
            </div>

            <!-- Class Form -->
            <div class="bg-slate-800/50 backdrop-blur-xl border border-slate-700 rounded-xl shadow-xl overflow-hidden">
                <div class="p-6 border-b border-slate-700">
                    <h2 class="text-lg font-semibold text-white">Detail Kelas</h2>
                </div>

                <form action="{{ isset($kelas) ? route('kelas.update', $kelas->id) : route('kelas.store') }}" method="POST"
                    class="p-6 space-y-6">
                    @csrf
                    @if (isset($kelas))
                        @method('PUT')
                    @endif

                    <div class="space-y-2">
                        <label for="nama_kelas" class="block text-sm font-medium text-slate-300">Nama Kelas</label>
                        <input type="text" name="nama_kelas" id="nama_kelas"
                            value="{{ old('nama_kelas', $kelas->nama_kelas ?? '') }}"
                            class="w-full px-3 py-2 bg-slate-700/50 border border-slate-600 rounded-lg text-slate-200 placeholder-slate-400 focus:outline-none focus:border-cyan-500 focus:ring-1 focus:ring-cyan-500"
                            placeholder="Masukkan nama kelas">
                        @error('nama_kelas')
                            <span class="text-red-400 text-sm">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="space-y-2">
                        <label for="tingkat" class="block text-sm font-medium text-slate-300">Tingkat</label>
                        <input type="number" name="tingkat" id="tingkat"
                            value="{{ old('tingkat', $kelas->tingkat ?? '') }}"
                            class="w-full px-3 py-2 bg-slate-700/50 border border-slate-600 rounded-lg text-slate-200 placeholder-slate-400 focus:outline-none focus:border-cyan-500 focus:ring-1 focus:ring-cyan-500"
                            placeholder="Masukkan tingkat kelas">
                        @error('tingkat')
                            <span class="text-red-400 text-sm">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="flex justify-end space-x-3">
                        <a href="{{ route('kelas.index') }}"
                            class="px-4 py-2 bg-slate-700 text-slate-300 rounded-lg hover:bg-slate-600 transition-colors duration-200">
                            Cancel
                        </a>
                        <button type="submit"
                            class="px-4 py-2 bg-gradient-to-r from-cyan-500 to-blue-500 hover:from-cyan-600 hover:to-blue-600 text-white font-medium rounded-lg transition-all duration-200">
                            {{ isset($kelas) ? 'Update Kelas' : 'Tambah Kelas' }}
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
