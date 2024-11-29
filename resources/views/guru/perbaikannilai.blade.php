@extends('layouts.app')

@section('title', 'Cari Siswa')

@section('contents')
    <div class="container mx-auto px-4 py-8">
        <h1 class="text-4xl font-bold text-center mb-8 text-blue-600">Cari Siswa</h1>

        <div class="mb-8">
            <h2 class="text-2xl font-semibold text-center mb-4">Pilih Mapel</h2>
            <div class="flex flex-wrap justify-center gap-4">
                @foreach ($mapel as $item)
                    <label class="inline-flex items-center space-x-2">
                        <input type="checkbox" name="mapel" value="{{ $item['nama'] }}" class="form-checkbox text-blue-500">
                        <span class="text-gray-700">{{ $item['nama'] }}</span>
                    </label>
                @endforeach
            </div>
        </div>

        <div class="mb-8">
            <h2 class="text-2xl font-semibold text-center mb-4">Pilih Kelas</h2>
            <div class="flex flex-wrap justify-center gap-4">
                @foreach ($kelas as $item)
                    <label class="inline-flex items-center space-x-2">
                        <input type="checkbox" name="kelas" value="{{ $item['nama_kelas'] }}"
                            class="form-checkbox text-blue-500">
                        <span class="text-gray-700">{{ $item['nama_kelas'] }}</span>
                    </label>
                @endforeach
            </div>
        </div>

        <div id="nisSearchContainer" class="mb-8 hidden">
            <input type="text" id="searchNIS"
                class="w-full p-4 border-2 border-gray-300 rounded-lg focus:outline-none focus:border-blue-500 transition duration-200"
                placeholder="Masukkan NIS Siswa...">
        </div>

        <div class="overflow-x-auto">
            <table class="min-w-full bg-white rounded-lg shadow-lg">
                <thead class="bg-blue-600 text-white">
                    <tr>
                        <th class="w-1/4 py-3 px-4 uppercase font-semibold text-sm">NIS</th>
                        <th class="w-1/4 py-3 px-4 uppercase font-semibold text-sm">Nama</th>
                        <th class="w-1/4 py-3 px-4 uppercase font-semibold text-sm">Kelas</th>
                        <th class="w-1/4 py-3 px-4 uppercase font-semibold text-sm">Aksi</th>
                    </tr>
                </thead>
                <tbody id="studentTable" class="text-gray-700">
                    {{-- Example of a table row, this should be dynamically generated --}}
                    {{-- 
                    <tr>
                        <td class="py-3 px-4 border-b border-gray-200">123456</td>
                        <td class="py-3 px-4 border-b border-gray-200">John Doe</td>
                        <td class="py-3 px-4 border-b border-gray-200">10A</td>
                        <td class="py-3 px-4 border-b border-gray-200">
                            <a href="/edit-nilai/{{ $student->id }}" class="text-blue-500 hover:underline">Perbaiki Nilai</a>
                        </td>
                    </tr>
                    --}}
                </tbody>
            </table>
        </div>
    </div>

    <script>
        const students = [{
                nis: '123456',
                nama: 'John Doe',
                kelas: '10A'
            },
            {
                nis: '789012',
                nama: 'Jane Smith',
                kelas: '10B'
            },
            // Add more student data here
        ];

        const mapelCheckboxes = document.querySelectorAll('input[name="mapel"]');
        const kelasCheckboxes = document.querySelectorAll('input[name="kelas"]');
        const nisSearchContainer = document.getElementById('nisSearchContainer');
        const searchNISInput = document.getElementById('searchNIS');
        const studentTable = document.getElementById('studentTable');

        function checkSelection() {
            const mapelChecked = Array.from(mapelCheckboxes).some(cb => cb.checked);
            const kelasChecked = Array.from(kelasCheckboxes).some(cb => cb.checked);
            if (mapelChecked && kelasChecked) {
                nisSearchContainer.classList.remove('hidden');
            } else {
                nisSearchContainer.classList.add('hidden');
            }
        }

        mapelCheckboxes.forEach(cb => cb.addEventListener('change', checkSelection));
        kelasCheckboxes.forEach(cb => cb.addEventListener('change', checkSelection));

        searchNISInput.addEventListener('input', function() {
            const searchValue = this.value.toLowerCase();
            const filteredStudents = students.filter(student => student.nis.toLowerCase().includes(searchValue));

            studentTable.innerHTML = '';

            filteredStudents.forEach(student => {
                const row = document.createElement('tr');

                row.innerHTML = `
                    <td class="py-3 px-4 border-b border-gray-200">${student.nis}</td>
                    <td class="py-3 px-4 border-b border-gray-200">${student.nama}</td>
                    <td class="py-3 px-4 border-b border-gray-200">${student.kelas}</td>
                    <td class="py-3 px-4 border-b border-gray-200">
                        <a href="/edit-nilai/${student.nis}" class="text-blue-500 hover:underline">Perbaiki Nilai</a>
                    </td>
                `;

                studentTable.appendChild(row);
            });
        });
    </script>
@endsection
