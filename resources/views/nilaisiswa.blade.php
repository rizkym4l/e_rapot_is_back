@extends('layouts.app')

@section('title', 'Data Nilai')

@section('contents')
    @if ($tahun_ajaran)
        <div class="container mx-auto px-4 py-8 h-full">
            <div class="flex items-center mb-8">
                <button onclick="window.history.back()"
                    class="btn bg-blue-500 text-white mx-2 sm:mx-0 border-blue-600 border-2 hover:bg-blue-600 hover:border-blue-700 mr-auto">Kembali</button>
                <h1 class="text-3xl font-semibold mx-2 sm:mx-10 w-full text-blue-800">Data Nilai</h1>
            </div>

            <div class="overflow-x-auto mb-8 shadow-md">
                <div class="p-6 bg-blue-100 rounded-lg shadow-md">
                    <h2 class="text-2xl font-semibold mb-4 text-gray-700">Data Siswa</h2>
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <p class="text-lg"><strong>Nama:</strong> <span
                                class="text-blue-700">{{ $siswa->nama_lengkap }}</span>
                        </p>
                        <p class="text-lg"><strong>NIS:</strong> <span class="text-blue-700">{{ $siswa->nis }}</span></p>
                        {{-- <p class="text-lg"><strong>Kelas:</strong> <span class="text-blue-700">{{ $nama_kelas }}</span></p> --}}
                        <p class="text-lg"><strong>Semester:</strong> <span class="text-blue-700">{{ $semester }}</span>
                        </p>
                        <p class="text-lg"><strong>Tahun Ajaran:</strong> <span
                                class="text-blue-700">{{ $tahun_ajaran['tahun'] }}</span>
                        </p>
                    </div>
                </div>
            </div>

            <div class="overflow-x-auto mb-8">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div class="bg-blue-100 p-4 rounded-lg shadow-md">
                        <h2 class="text-2xl font-semibold mb-4 text-gray-700">Sikap Sosial</h2>
                        <div class="flex justify-center items-center h-24">
                            <span class="text-gray-500 text-xl">Coming Soon</span>
                        </div>
                    </div>
                    <div class="bg-blue-100 p-4 rounded-lg shadow-md">
                        <h2 class="text-2xl font-semibold mb-4 text-gray-700">Sikap Spiritual</h2>
                        <div class="flex justify-center items-center h-24">
                            <span class="text-gray-500 text-xl">Coming Soon</span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="overflow-x-auto mb-8">
                <h2 class="text-2xl font-semibold mb-4 text-gray-700">Nilai Pengetahuan</h2>
                @if (count($data) === 0)
                    <div class="flex justify-center items-center h-64">
                        <div class="text-center">
                            <svg class="emoji-404 w-24 h-24 mx-auto mb-4 animate-bounce"
                                enable-background="new 0 0 226 249.135" height="249.135" id="Layer_1" overflow="visible"
                                version="1.1" viewBox="0 0 226 249.135" width="226" xml:space="preserve">
                                <circle cx="113" cy="113" fill="#FFE585" r="109" />
                                <line enable-background="new    " fill="none" opacity="0.29" stroke="#6E6E96"
                                    stroke-linecap="round" stroke-linejoin="round" stroke-width="8" x1="88.866"
                                    x2="136.866" y1="245.135" y2="245.135" />
                                <line enable-background="new    " fill="none" opacity="0.17" stroke="#6E6E96"
                                    stroke-linecap="round" stroke-linejoin="round" stroke-width="8" x1="154.732"
                                    x2="168.732" y1="245.135" y2="245.135" />
                                <line enable-background="new    " fill="none" opacity="0.17" stroke="#6E6E96"
                                    stroke-linecap="round" stroke-linejoin="round" stroke-width="8" x1="69.732"
                                    x2="58.732" y1="245.135" y2="245.135" />
                                <circle cx="68.732" cy="93" fill="#6E6E96" r="9" />
                                <path
                                    d="M115.568,5.947c-1.026,0-2.049,0.017-3.069,0.045  c54.425,1.551,98.069,46.155,98.069,100.955c0,55.781-45.219,101-101,101c-55.781,0-101-45.219-101-101  c0-8.786,1.124-17.309,3.232-25.436c-3.393,10.536-5.232,21.771-5.232,33.436c0,60.199,48.801,109,109,109s109-48.801,109-109  S175.768,5.947,115.568,5.947z"
                                    enable-background="new    " fill="#FF9900" opacity="0.24" />
                                <circle cx="156.398" cy="93" fill="#6E6E96" r="9" />
                                <ellipse cx="67.732" cy="140.894" enable-background="new    " fill="#FF0000"
                                    opacity="0.18" rx="17.372" ry="8.106" />
                                <ellipse cx="154.88" cy="140.894" enable-background="new    " fill="#FF0000"
                                    opacity="0.18" rx="17.371" ry="8.106" />
                                <path
                                    d="M13,118.5C13,61.338,59.338,15,116.5,15c55.922,0,101.477,44.353,103.427,99.797  c0.044-1.261,0.073-2.525,0.073-3.797C220,50.802,171.199,2,111,2S2,50.802,2,111c0,50.111,33.818,92.318,79.876,105.06  C41.743,201.814,13,163.518,13,118.5z"
                                    fill="#FFEFB5" />
                                <circle cx="113" cy="113" fill="none" r="109" stroke="#6E6E96"
                                    stroke-width="8" />
                            </svg>

                            <div class="animate-bounce text-gray-500 text-xl">Data Belum Tersedia</div>
                        </div>
                    </div>
                @else
                    <table class="min-w-full bg-white shadow-xl text-black border-collapse border border-black rounded-lg">
                        <thead class="bg-blue-100">
                            <tr>
                                @foreach ($data[0] as $header)
                                    <th class="text-left py-2 px-4 border border-black">{{ $header }}</th>
                                @endforeach
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $key => $row)
                                @if ($key > 0)
                                    <tr class="hover:bg-gray-100">
                                        <td class="text-center py-2 px-4 border border-black">{{ $key }}.</td>
                                        <td class="py-2 px-4 border border-black text-left">{{ $row['mapel_id'] }}</td>
                                        @foreach ($sap as $n)
                                            <td class="py-2 px-4 border border-black text-center">
                                                {{ $row[$n->name] ?? '-' }}
                                            </td>
                                        @endforeach
                                        {{-- <td class="py-2 px-4 border border-black text-center">{{ $row['keterangan'] ?? '' }}
                                    </td> --}}
                                    </tr>
                                @endif
                            @endforeach
                        </tbody>
                    </table>
                @endif
            </div>

            @if ($history->isNotEmpty())
                <div class="mt-8">
                    <h3 class="text-lg font-semibold mb-2">History Perubahan Nilai</h3>
                    <table class="min-w-full bg-white shadow-xl text-black border-collapse border border-black rounded-lg">
                        <thead class="bg-blue-100">
                            <tr>
                                <th class="text-left py-2 px-4 border border-black">Tanggal</th>
                                <th class="text-left py-2 px-4 border border-black">Mata Pelajaran</th>
                                <th class="text-left py-2 px-4 border border-black">Nilai Sebelum</th>
                                <th class="text-left py-2 px-4 border border-black">Nilai Sesudah</th>
                                <th class="text-left py-2 px-4 border border-black">Keterangan Nilai</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($history as $entry)
                                <tr class="hover:bg-gray-100">
                                    <td class="py-2 px-4 border border-black">{{ $entry->created_at->format('d-m-Y') }}
                                    </td>
                                    <td class="py-2 px-4 border border-black">{{ $entry->mapel_name }}</td>
                                    <td class="py-2 px-4 border border-black">{{ $entry->nilai_before }}</td>
                                    <td class="py-2 px-4 border border-black">{{ $entry->nilai_after }}</td>
                                    <td class="py-2 px-4 border border-black">{{ $entry->nilai_name }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                    <!-- Pagination Links -->
                    <div class="mt-4">
                        {{ $history->links() }} <!-- Laravel menyediakan pagination otomatis -->
                    </div>
                </div>
            @else
                <div class="mt-8">
                    <p class="text-gray-500 text-xl">Belum Ada Perubahan Nilai</p>
                </div>
            @endif



            <div class="flex justify-end mt-4">
                <a href="{{ route('siswa.cetak-nilai', $siswa->nis) }}?semester={{ $semester }}&tingkat={{ $tingkat }}"
                    target="_blank"
                    class="btn bg-green-500 text-white border-green-600 border-2 hover:bg-green-600 hover:border-green-700">
                    Cetak Nilai
                </a>
            </div>

        </div>
    @else
        <p class="text-lg text-red-500"><strong>Tahun Ajaran:</strong> Data belum tersedia</p>
    @endif

@endsection
