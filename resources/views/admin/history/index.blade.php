@extends('layouts.main')

@section('contentAdmin')
    <div class="min-h-screen bg-slate-900 p-6">
        <div class="container mx-auto space-y-6">
            <!-- Header -->
            <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4">
                <h2 class="text-2xl font-bold bg-gradient-to-r from-cyan-400 to-blue-400 bg-clip-text text-transparent">
                    History
                </h2>
            </div>

            <!-- Search Section -->
            <div class="flex flex-col md:flex-row gap-4">
                <form action="{{ route('index.history') }}" method="GET" class="flex-1">
                    <div class="relative">
                        <svg xmlns="http://www.w3.org/2000/svg"
                            class="h-5 w-5 absolute left-3 top-1/2 transform -translate-y-1/2 text-slate-400" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                        </svg>
                        <input type="text" name="search" id="search"
                            class="w-full pl-10 pr-4 py-2 bg-slate-800 border border-slate-700 rounded-lg text-slate-200 placeholder-slate-400 focus:outline-none focus:border-cyan-500 focus:ring-1 focus:ring-cyan-500"
                            placeholder="Search by Student Name or Subject..." value="{{ request()->input('search') }}">
                    </div>
                    <input type="hidden" name="sort" value="latest">
                </form>
                <button type="submit"
                    class="px-4 py-2 bg-slate-800 hover:bg-slate-700 text-slate-200 rounded-lg border border-slate-700 transition-colors duration-200">
                    Sort by Latest
                </button>
            </div>

            <!-- New buttons -->
            <div class="flex flex-col md:flex-row gap-4">
                <button onclick="openDownloadModal()"
                    class="px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white rounded-lg transition-colors duration-200">
                    Download Monthly Report
                </button>
                {{-- <div class="flex items-center space-x-4">
                    <label class="inline-flex items-center">
                        <input type="radio" class="form-radio text-blue-600" name="score_type" value="all" checked>
                        <span class="ml-2 text-slate-200">All Scores</span>
                    </label>
                    <label class="inline-flex items-center">
                        <input type="radio" class="form-radio text-blue-600" name="score_type" value="updated">
                        <span class="ml-2 text-slate-200">Updated Scores</span>
                    </label>
                    <label class="inline-flex items-center">
                        <input type="radio" class="form-radio text-blue-600" name="score_type" value="new">
                        <span class="ml-2 text-slate-200">New Scores</span>
                    </label>
                </div> --}}
            </div>

            <!-- Table Card -->
            <div class="bg-slate-800 rounded-xl border border-slate-700 shadow-xl overflow-hidden">
                <div class="p-6 border-b border-slate-700">
                    <h3 class="text-lg font-semibold text-white">List of History </h3>
                </div>

                <div class="overflow-x-auto">
                    <table class="w-full">
                        <thead>
                            <tr class="bg-slate-700/50 text-slate-300 text-sm">
                                <th class="py-3 px-6 text-left">Student Name</th>
                                <th class="py-3 px-6 text-left">Subject</th>
                                <th class="py-3 px-6 text-left">Grade Before</th>
                                <th class="py-3 px-6 text-left">Current Grade</th>
                                <th class="py-3 px-6 text-left">Modified By</th>
                                <th class="py-3 px-6 text-left">Updated At</th>
                                <th class="py-3 px-6 text-left">Created At</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-slate-700">
                            @forelse ($history as $item)
                                <tr class="text-slate-300 hover:bg-slate-700/50 transition-colors duration-200 cursor-pointer"
                                    onclick="openModal({{ json_encode($item) }})">
                                    <td class="py-3 px-6">{{ $item->siswa->nama_lengkap }}</td>
                                    <td class="py-3 px-6">{{ $item->nilaiSiswa->mapel->nama }}</td>
                                    <td class="py-3 px-6">
                                        <span class="px-2 py-1 rounded-full text-sm bg-slate-700 text-white">
                                            {{ $item->nilai_before }}
                                        </span>
                                    </td>
                                    <td class="py-3 px-6">
                                        <span
                                            class="px-2 py-1 rounded-full text-sm 
                                        {{ $item->nilai_after > $item->nilai_before
                                            ? 'bg-emerald-900 text-emerald-300'
                                            : ($item->nilai_after < $item->nilai_before
                                                ? 'bg-red-900 text-red-300'
                                                : 'bg-slate-700 text-white') }}">
                                            {{ $item->nilai_after }}
                                        </span>
                                    </td>
                                    <td class="py-3 px-6">{{ $item->user->name }}</td>
                                    <td class="py-3 px-6">{{ $item->updated_at }}</td>
                                    <td class="py-3 px-6">{{ $item->created_at }}</td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="7" class="py-8 text-center text-slate-400">
                                        <div class="flex flex-col items-center justify-center space-y-3">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 text-slate-500"
                                                fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                            </svg>
                                            <p>No history records found.</p>
                                        </div>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                <!-- Pagination -->
                <div class="p-4 border-t border-slate-700">
                    {{ $history->links() }}
                </div>
            </div>
        </div>

        <!-- Existing Modal -->
        <div id="modal"
            class="fixed inset-0 bg-slate-900/90 backdrop-blur-sm flex items-center justify-center hidden z-50">
            <div class="bg-slate-800 w-full max-w-2xl rounded-xl border border-slate-700 shadow-2xl"
                x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 scale-90"
                x-transition:enter-end="opacity-100 scale-100">
                <div class="p-6 border-b border-slate-700">
                    <h3 class="text-xl font-semibold text-white">Detail Perubahan Nilai Siswa</h3>
                </div>

                <div class="p-6 space-y-4">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div class="space-y-2">
                            <label class="text-sm text-slate-400">Nama Siswa</label>
                            <p class="text-white font-medium" id="modal-student-name"></p>
                        </div>
                        <div class="space-y-2">
                            <label class="text-sm text-slate-400">NIS</label>
                            <p class="text-white font-medium" id="modal-nis"></p>
                        </div>
                        <div class="space-y-2">
                            <label class="text-sm text-slate-400">Kelas</label>
                            <p class="text-white font-medium" id="modal-class"></p>
                        </div>
                        <div class="space-y-2">
                            <label class="text-sm text-slate-400">Mata Pelajaran</label>
                            <p class="text-white font-medium" id="modal-subject"></p>
                        </div>
                        <div class="space-y-2">
                            <label class="text-sm text-slate-400">Tanggal Perubahan</label>
                            <p class="text-white font-medium" id="modal-date"></p>
                        </div>
                        <div class="space-y-2">
                            <label class="text-sm text-slate-400">Nilai</label>
                            <div class="flex items-center gap-2">
                                <span class="px-3 py-1 rounded-full bg-slate-700 text-white" id="modal-old-grade"></span>
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-slate-400"
                                    viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd"
                                        d="M12.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-2.293-2.293a1 1 0 010-1.414z"
                                        clip-rule="evenodd" />
                                </svg>
                                <span class="px-3 py-1 rounded-full bg-cyan-900 text-cyan-300"
                                    id="modal-new-grade"></span>
                            </div>
                        </div>
                    </div>
                    <div class="space-y-2">
                        <label class="text-sm text-slate-400">Catatan</label>
                        <p class="text-white font-medium" id="modal-notes"></p>
                    </div>
                </div>

                <div class="p-6 border-t border-slate-700 flex justify-end gap-3">
                    <button onclick="closeModal()"
                        class="px-4 py-2 bg-slate-700 hover:bg-slate-600 text-white rounded-lg transition-colors duration-200">
                        Kembali
                    </button>
                </div>
            </div>
        </div>

        <!-- New Download Report Modal -->
        <div id="downloadModal"
            class="fixed inset-0 bg-slate-900/90 backdrop-blur-sm flex items-center justify-center hidden z-50">
            <div class="bg-slate-800 w-full max-w-md rounded-xl border border-slate-700 shadow-2xl">
                <div class="p-6 border-b border-slate-700">
                    <h3 class="text-xl font-semibold text-white">Download Monthly Report</h3>
                </div>
                <div class="p-6 space-y-4">
                    <div class="space-y-2">
                        <label for="year" class="text-sm text-slate-400">Year</label>
                        <select id="year"
                            class="w-full px-3 py-2 bg-slate-700 border border-slate-600 rounded-lg text-slate-200">
                            @for ($i = date('Y'); $i >= date('Y') - 10; $i--)
                                <option value="{{ $i }}">{{ $i }}</option>
                            @endfor
                        </select>
                    </div>
                    <div class="space-y-2">
                        <label for="month" class="text-sm text-slate-400">Month</label>
                        <select id="month"
                            class="w-full px-3 py-2 bg-slate-700 border border-slate-600 rounded-lg text-slate-200">
                            @foreach (['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'] as $index => $month)
                                <option value="{{ $index + 1 }}">{{ $month }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="p-6 border-t border-slate-700 flex justify-end gap-3">
                    <button onclick="closeDownloadModal()"
                        class="px-4 py-2 bg-slate-700 hover:bg-slate-600 text-white rounded-lg transition-colors duration-200">
                        Cancel
                    </button>
                    <button onclick="downloadReport()"
                        class="px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white rounded-lg transition-colors duration-200">
                        Download
                    </button>
                </div>
            </div>
        </div>


        <script>
            let currentItem = null;

            function openModal(item) {
                currentItem = item;
                console.log(item);
                document.getElementById('modal-student-name').innerText = item.siswa.nama_lengkap || 'N/A';
                document.getElementById('modal-nis').innerText = item.siswa.nis || 'N/A';
                document.getElementById('modal-class').innerText = item.siswa.kelas || 'N/A';
                document.getElementById('modal-subject').innerText = item.nilai_siswa.mapel.nama || 'N/A';
                document.getElementById('modal-date').innerText = new Date(item.updated_at).toLocaleDateString() || 'N/A';
                document.getElementById('modal-old-grade').innerText = item.nilai_before || 'N/A';
                document.getElementById('modal-new-grade').innerText = item.nilai_after;
                document.getElementById('modal-notes').innerText = item.catatan || 'Tidak ada catatan';

                document.getElementById('modal').classList.remove('hidden');
                document.body.style.overflow = 'hidden';
            }

            function closeModal() {
                document.getElementById('modal').classList.add('hidden');
                document.body.style.overflow = 'auto';
            }

            function openDownloadModal() {
                document.getElementById('downloadModal').classList.remove('hidden');
                document.body.style.overflow = 'hidden';
            }

            function closeDownloadModal() {
                document.getElementById('downloadModal').classList.add('hidden');
                document.body.style.overflow = 'auto';
            }

            function downloadReport() {
                const year = document.getElementById('year').value;
                const month = document.getElementById('month').value;

                // Redirect to the download route with year and month as query parameters
                window.location.href = `/download-report?year=${year}&month=${month}`;

                closeDownloadModal();
            }

            function handleScoreTypeChange() {
                const scoreType = document.querySelector('input[name="score_type"]:checked').value;
                console.log(`Filtering by score type: ${scoreType}`);
            }

            // Add event listeners when the DOM is fully loaded
            document.addEventListener('DOMContentLoaded', function() {
                // Add event listeners for radio buttons
                document.querySelectorAll('input[name="score_type"]').forEach(radio => {
                    radio.addEventListener('change', handleScoreTypeChange);
                });

                // Close modals on escape key
                document.addEventListener('keydown', function(event) {
                    if (event.key === 'Escape') {
                        closeModal();
                        closeDownloadModal();
                    }
                });

                // Close modals on outside click
                document.getElementById('modal').addEventListener('click', function(event) {
                    if (event.target === this) {
                        closeModal();
                    }
                });

                document.getElementById('downloadModal').addEventListener('click', function(event) {
                    if (event.target === this) {
                        closeDownloadModal();
                    }
                });

                // Add event listener for the download button
                document.querySelector('button[onclick="openDownloadModal()"]').addEventListener('click',
                    openDownloadModal);
            });
        </script>

    </div>
@endsection
