@extends('layouts.app')

@section('title', 'Tampilkan Nilai')

@section('contents')
    <div class="container mx-auto px-4 py-8">
        @if (session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
                <strong class="font-bold">Success!</strong>
                <span class="block sm:inline">{{ session('success') }}</span>
                <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
                    <svg class="fill-current h-6 w-6 text-green-500" role="button" xmlns="http://www.w3.org/2000/svg"
                        viewBox="0 0 20 20">
                        <path
                            d="M14.348 14.849l-4.197-4.197-4.197 4.197-1.414-1.414 4.197-4.197-4.197-4.197 1.414-1.414 4.197 4.197 4.197-4.197 1.414 1.414-4.197 4.197 4.197 4.197z" />
                    </svg>
                </span>
            </div>
        @endif

        <h1 class="text-4xl font-bold text-center mb-4 text-blue-600 py-10">Tampilkan Nilai</h1>
        <div class="bg-white p-6 rounded-lg shadow-md">
            <h2 class="text-2xl font-semibold text-center text-gray-800 mb-6">Identitas Siswa</h2>
            <div class="mb-4">
                <p><strong>NIS:</strong> <span id="test">{{ $siswa->nis }}</span></p>
                <p><strong>Nama Lengkap:</strong> {{ $siswa->nama_lengkap }}</p>
                <p><strong>Kelas:</strong> {{ $siswa->kelas->nama_kelas }}</p>
            </div>

            <h2 class="text-2xl font-semibold text-center text-gray-800 mb-6">Nilai Siswa</h2>
            <div class="grid grid-cols-3 gap-4 my-10">
                <div class="flex items-center ps-4 border bg-blue-200 border-none rounded dark:border-gray-700">
                    <input id="bordered-radio-1" type="radio" value="1" name="bordered-radio"
                        class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600"
                        checked>
                    <label for="bordered-radio-1" class="w-full py-4 ms-2 text-sm font-medium text-blue-600">
                        Tahun 1</label>
                </div>
                <div class="flex items-center ps-4 border bg-blue-200 border-none rounded dark:border-gray-700">
                    <input id="bordered-radio-2" type="radio" value="2" name="bordered-radio"
                        class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                    <label for="bordered-radio-2" class="w-full py-4 ms-2 text-sm font-medium text-blue-600">
                        Tahun 2</label>
                </div>
                <div class="flex items-center ps-4 border bg-blue-200 border-none rounded dark:border-gray-700">
                    <input id="bordered-radio-3" type="radio" value="3" name="bordered-radio"
                        class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                    <label for="bordered-radio-3" class="w-full py-4 ms-2 text-sm font-medium text-blue-600">
                        Tahun 3</label>
                </div>
            </div>

            <div class="grid grid-cols-2 gap-4 my-10">
                <div class="flex items-center ps-4 border bg-blue-200 border-none rounded dark:border-gray-700">
                    <input id="bordered-radio-4" type="radio" value="1" name="p"
                        class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600"
                        checked>
                    <label for="bordered-radio-4" class="w-full py-4 ms-2 text-sm font-medium text-blue-600">Semester
                        1</label>
                </div>
                <div class="flex items-center ps-4 border bg-blue-200 border-none rounded dark:border-gray-700">
                    <input id="bordered-radio-5" type="radio" value="2" name="p"
                        class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                    <label for="bordered-radio-5" class="w-full py-4 ms-2 text-sm font-medium text-blue-600">Semester
                        2</label>
                </div>
            </div>

            <table class="min-w-full bg-white border border-gray-200">
                <thead>
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Mapel
                        </th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Semester
                        </th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Jenis
                            Nilai</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nilai
                        </th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Keterangan</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($nilaiSiswa as $nilai)
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap">{{ $nilai->mapel->nama }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">{{ $nilai->semester }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">{{ $nilai['nilaiNama']['name'] }}</td>
                            <td
                                class="px-6 py-4 whitespace-nowrap {{ $nilai->nilai < $nilai->mapel->kkm ? 'text-red-500' : '' }}">
                                {{ $nilai->nilai }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">{{ $nilai->keterangan }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <a href="{{ route('nilai.edit', $nilai->id) }}" class="text-blue-500">Edit</a> |
                                <form action="{{ route('nilai.destroy', $nilai->id) }}" method="POST" class="inline-block"
                                    onsubmit="return confirm('Apakah Anda yakin ingin menghapus nilai ini?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-500">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const yearRadios = document.querySelectorAll('input[name="bordered-radio"]');
        const semesterRadios = document.querySelectorAll('input[name="p"]');
        const nisElement = document.getElementById('test');
        const nisText = nisElement.innerText;

        function fetchData(tahunAjaranId, semesterId, nisText) {
            fetch(`/fetch/nilai/${nisText}?tahun_ajaran_id=${tahunAjaranId}&semester_id=${semesterId}`)
                .then(response => response.json())
                .then(data => {
                    updateTable(data);
                })
                .catch(error => console.error('Error:', error));
        }

        function updateTable(data) {
            const tbody = document.querySelector('tbody');
            tbody.innerHTML = ''; // Clear the table

            data.forEach(nilai => {
                console.log(nilai)
                const row = `
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap">${nilai.mapel.nama}</td>
                        <td class="px-6 py-4 whitespace-nowrap">${nilai.semester}</td>
                        <td class="px-6 py-4 whitespace-nowrap">${nilai.nilai_nama.name}</td>
                        <td class="px-6 py-4 whitespace-nowrap ${nilai.nilai < nilai.mapel.kkm ? 'text-red-500' : ''}">${nilai.nilai}</td>
                        <td class="px-6 py-4 whitespace-nowrap">${nilai.keterangan}</td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <a href="/nilai/edit/${nilai.id}" class="text-blue-500">Edit</a> |
                            <form action="/nilai/destroy/${nilai.id}" method="POST" class="inline-block" onsubmit="return confirm('Apakah Anda yakin ingin menghapus nilai ini?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-500">Hapus</button>
                            </form>
                        </td>
                    </tr>
                `;
                tbody.insertAdjacentHTML('beforeend', row);
            });
        }

        yearRadios.forEach(radio => {
            radio.addEventListener('change', function() {
                const selectedYear = document.querySelector(
                    'input[name="bordered-radio"]:checked').value;
                const selectedSemester = document.querySelector('input[name="p"]:checked')
                    .value;
                fetchData(selectedYear, selectedSemester, nisText);
            });
        });

        semesterRadios.forEach(radio => {
            radio.addEventListener('change', function() {
                const selectedYear = document.querySelector(
                    'input[name="bordered-radio"]:checked').value;
                const selectedSemester = document.querySelector('input[name="p"]:checked')
                    .value;
                fetchData(selectedYear, selectedSemester, nisText);
            });
        });

        // Initialize the table with default values
        const initialYear = document.querySelector('input[name="bordered-radio"]:checked').value;
        const initialSemester = document.querySelector('input[name="p"]:checked').value;
        fetchData(initialYear, initialSemester, nisText);
    });
</script>
