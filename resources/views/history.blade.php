@extends('layouts.app')

@section('title', 'History Nilai')

@section('contents')
    <div class="min-h-screen bg-gradient-to-b from-slate-900 to-slate-800">
        <div class="container mx-auto px-4 py-8">
            <!-- Header with animation -->
            <div class="text-center mb-8 space-y-4">
                <h1
                    class="text-4xl font-bold bg-gradient-to-r from-cyan-400 to-blue-400 bg-clip-text text-transparent 
                       animate-fade-in relative inline-block">
                    History Nilai
                    <div
                        class="absolute -bottom-2 left-0 right-0 h-1 bg-gradient-to-r from-cyan-400 to-blue-400 
                          transform origin-left animate-scale-x rounded-full">
                    </div>
                </h1>
            </div>

            <!-- Main Card -->
            <div
                class="bg-slate-800 rounded-2xl shadow-xl border border-slate-700 
                    backdrop-blur-lg backdrop-filter overflow-hidden transition-all duration-500 hover:shadow-2xl">

                <!-- Student Info Section -->
                <div class="p-6 border-b border-slate-700 space-y-6">
                    <h2 class="text-2xl font-semibold text-white mb-6">
                        History Perubahan Nilai
                    </h2>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div class="p-4 bg-slate-700/50 rounded-xl">
                            <div class="flex items-center space-x-3">
                                <div class="p-2 bg-cyan-900 rounded-lg">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-cyan-400"
                                        viewBox="0 0 20 20" fill="currentColor">
                                        <path d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" />
                                    </svg>
                                </div>
                                <div>
                                    <p class="text-sm text-slate-400">Nama Siswa</p>
                                    <p class="text-lg font-semibold text-white">
                                        {{ $nilai->siswa->nama_lengkap }}
                                    </p>
                                </div>
                            </div>
                        </div>

                        <div class="p-4 bg-slate-700/50 rounded-xl">
                            <div class="flex items-center space-x-3">
                                <div class="p-2 bg-blue-900 rounded-lg">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-blue-400"
                                        viewBox="0 0 20 20" fill="currentColor">
                                        <path
                                            d="M9 4.804A7.968 7.968 0 005.5 4c-1.255 0-2.443.29-3.5.804v10A7.969 7.969 0 015.5 14c1.669 0 3.218.51 4.5 1.385A7.962 7.962 0 0114.5 14c1.255 0 2.443.29 3.5.804v-10A7.968 7.968 0 0014.5 4c-1.255 0-2.443.29-3.5.804V12a1 1 0 11-2 0V4.804z" />
                                    </svg>
                                </div>
                                <div>
                                    <p class="text-sm text-slate-400">Mata Pelajaran</p>
                                    <p class="text-lg font-semibold text-white">
                                        {{ $nilai->mapel->nama }}
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Table Section -->
                <div class="p-6">
                    <div class="overflow-x-auto">
                        <table class="w-full">
                            <thead>
                                <tr class="bg-slate-700/50 text-left">
                                    <th class="px-6 py-4 text-sm font-semibold text-slate-300 rounded-l-lg">
                                        Diperbarui Oleh
                                    </th>
                                    <th class="px-6 py-4 text-sm font-semibold text-slate-300">
                                        Nilai Sebelum
                                    </th>
                                    <th class="px-6 py-4 text-sm font-semibold text-slate-300">
                                        Nilai Sesudah
                                    </th>
                                    <th class="px-6 py-4 text-sm font-semibold text-slate-300 rounded-r-lg">
                                        Waktu Update
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-slate-700">
                                @forelse ($history as $log)
                                    <tr class="group hover:bg-slate-700/50 transition-colors duration-200">
                                        <td class="px-6 py-4">
                                            <div class="flex items-center space-x-3">
                                                <span
                                                    class="inline-flex items-center justify-center h-8 w-8 rounded-full bg-slate-600">
                                                    <span class="text-sm font-medium leading-none text-white">
                                                        {{ substr($log->user->name, 0, 2) }}
                                                    </span>
                                                </span>
                                                <span class="text-sm text-slate-300">{{ $log->user->name }}</span>
                                            </div>
                                        </td>
                                        <td class="px-6 py-4">
                                            <span
                                                class="inline-flex items-center px-2.5 py-0.5 rounded-full text-sm font-medium bg-slate-600 text-white">
                                                {{ $log->nilai_before }}
                                            </span>
                                        </td>
                                        <td class="px-6 py-4">
                                            <span
                                                class="inline-flex items-center px-2.5 py-0.5 rounded-full text-sm font-medium 
                                                   {{ $log->nilai_after > $log->nilai_before
                                                       ? 'bg-emerald-900 text-emerald-300'
                                                       : ($log->nilai_after < $log->nilai_before
                                                           ? 'bg-red-900 text-red-300'
                                                           : 'bg-slate-600 text-white') }}">
                                                {{ $log->nilai_after }}
                                            </span>
                                        </td>
                                        <td class="px-6 py-4">
                                            <span class="text-sm text-black">
                                                {{ $log->created_at->format('d M Y H:i') }}
                                            </span>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="4" class="px-6 py-8 text-center text-slate-400">
                                            <div class="flex flex-col items-center justify-center space-y-3">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 text-slate-500"
                                                    fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                                </svg>
                                                <p>No history found for this nilai.</p>
                                            </div>
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>

                <!-- Footer Action -->
                <div class="p-6 border-t border-slate-700">
                    <a href="{{ route('nilai.index') }}"
                        class="inline-flex items-center justify-center px-6 py-3 border border-transparent text-base font-medium rounded-lg text-white 
                          bg-gradient-to-r from-cyan-500 to-blue-500 hover:from-cyan-600 hover:to-blue-600 
                          focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-cyan-500 transition-all duration-200
                          shadow-lg hover:shadow-xl">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 20 20"
                            fill="currentColor">
                            <path fill-rule="evenodd"
                                d="M9.707 16.707a1 1 0 01-1.414 0l-6-6a1 1 0 010-1.414l6-6a1 1 0 011.414 1.414L5.414 9H17a1 1 0 110 2H5.414l4.293 4.293a1 1 0 010 1.414z"
                                clip-rule="evenodd" />
                        </svg>
                        Back to Nilai
                    </a>
                </div>
            </div>
        </div>
    </div>

    <style>
        @keyframes fade-in {
            from {
                opacity: 0;
                transform: translateY(-10px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes scale-x {
            from {
                transform: scaleX(0);
            }

            to {
                transform: scaleX(1);
            }
        }

        .animate-fade-in {
            animation: fade-in 0.6s ease-out forwards;
        }

        .animate-scale-x {
            animation: scale-x 0.6s ease-out forwards;
        }
    </style>
@endsection
