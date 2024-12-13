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
                                d="M8 9a3 3 0 100-6 3 3 0 000 6zM8 11a6 6 0 016 6H2a6 6 0 016-6zM16 7a1 1 0 10-2 0v1h-1a1 1 0 100 2h1v1a1 1 0 102 0v-1h1a1 1 0 100-2h-1V7z" />
                        </svg>
                    </div>
                    <div>
                        <h1
                            class="text-2xl font-bold bg-gradient-to-r from-cyan-400 to-blue-400 bg-clip-text text-transparent">
                            Add New User
                        </h1>
                        <p class="text-slate-400">Create a new user account</p>
                    </div>
                </div>
            </div>
        <!-- Alert Messages -->
        @if (session('success'))
        <div class="p-4 mb-6 text-sm text-green-800 bg-green-100 border border-green-200 rounded-lg" role="alert">
            {{ session('success') }}
        </div>
        @endif
        
        @if (session('error'))
        <div class="p-4 mb-6 text-sm text-red-800 bg-red-100 border border-red-200 rounded-lg" role="alert">
            {{ session('error') }}
        </div>
        @endif
        
        @if ($errors->any())
        <div class="p-4 mb-6 text-sm text-red-800 bg-red-100 border border-red-200 rounded-lg" role="alert">
            <strong>Whoops! Something went wrong:</strong>
            <ul class="mt-2">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
            <!-- Add User Form -->
            <div class="bg-slate-800/50 backdrop-blur-xl border border-slate-700 rounded-xl shadow-xl overflow-hidden">
                <form action="{{ route('users.store') }}" method="POST" enctype="multipart/form-data"
                    class="space-y-6">
                    @csrf
                    <!-- User Account Details -->
                    <div class="p-6 border-b border-slate-700">
                        <h2 class="text-lg font-semibold text-white">User Details</h2>
                    </div>

                    <div class="p-6 space-y-6">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <!-- Name -->
                            <div class="space-y-2">
                                <label for="username" class="block text-sm font-medium text-slate-300">Username</label>
                                <input type="text" name="username" id="name" required
                                    class="w-full px-3 py-2 bg-slate-700/50 border border-slate-600 rounded-lg text-slate-200 placeholder-slate-400 focus:outline-none focus:border-cyan-500 focus:ring-1 focus:ring-cyan-500"
                                    placeholder="Enter user's name">
                            </div>

                            <!-- Email -->
                            <div class="space-y-2">
                                <label for="email" class="block text-sm font-medium text-slate-300">Email</label>
                                <input type="email" name="email" id="email" required
                                    class="w-full px-3 py-2 bg-slate-700/50 border border-slate-600 rounded-lg text-slate-200 placeholder-slate-400 focus:outline-none focus:border-cyan-500 focus:ring-1 focus:ring-cyan-500"
                                    placeholder="Enter user's email">
                            </div>

                            <!-- Password -->
                            <div class="space-y-2">
                                <label for="password" class="block text-sm font-medium text-slate-300">Password</label>
                                <input type="password" name="password" id="password" required
                                    class="w-full px-3 py-2 bg-slate-700/50 border border-slate-600 rounded-lg text-slate-200 placeholder-slate-400 focus:outline-none focus:border-cyan-500 focus:ring-1 focus:ring-cyan-500"
                                    placeholder="Create a password">
                            </div>

                            <!-- Role -->
                            <div class="space-y-2">
                                <label for="role" class="block text-sm font-medium text-slate-300">Role</label>
                                <select name="role" id="role" required
                                    class="w-full px-3 py-2 bg-slate-700/50 border border-slate-600 rounded-lg text-slate-200 focus:outline-none focus:border-cyan-500 focus:ring-1 focus:ring-cyan-500">
                                    <option value="">Select Role</option>
                                    <option value="admin">Admin</option>
                                    <option value="siswa">Siswa</option>
                                    <option value="guru">Guru</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <!-- Additional User Info -->
                    <div id="dataDiriSection" class="p-6 space-y-6">
                        <h2 class="text-lg font-semibold text-white">Data Diri</h2>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div class="space-y-2">
                                <label for="username" class="block text-sm font-medium text-slate-300">Name</label>
                                <input type="text" name="name" id="name" required
                                    class="w-full px-3 py-2 bg-slate-700/50 border border-slate-600 rounded-lg text-slate-200 placeholder-slate-400 focus:outline-none focus:border-cyan-500 focus:ring-1 focus:ring-cyan-500"
                                    placeholder="Enter  name">
                            </div>
                            <!-- NIS/NIPK -->
                            <div class="space-y-2">
                                <label for="nis_nipk" class="block text-sm font-medium text-slate-300">NIS/NIPK</label>
                                <input type="text" name="nis_nipk" id="nis_nipk" required
                                    class="w-full px-3 py-2 bg-slate-700/50 border border-slate-600 rounded-lg text-slate-200 focus:outline-none focus:border-cyan-500 focus:ring-1 focus:ring-cyan-500"
                                    placeholder="Enter NIS or NIPK">
                            </div>
                            <!-- Class ID -->
                            <div id="classIdField" class="space-y-2">
                                <label for="kelas_id" class="block text-sm font-medium text-slate-300">Class ID</label>
                                <input type="text" name="kelas_id" id="kelas_id"
                                    class="w-full px-3 py-2 bg-slate-700/50 border border-slate-600 rounded-lg text-slate-200 focus:outline-none focus:border-cyan-500 focus:ring-1 focus:ring-cyan-500"
                                    placeholder="Enter Class ID (optional)">
                            </div>

                            <!-- Level -->
                            <div id="levelField" class="space-y-2">
                                <label for="tingkat" class="block text-sm font-medium text-slate-300">Level</label>
                                <input type="text" name="tingkat" id="tingkat"
                                    class="w-full px-3 py-2 bg-slate-700/50 border border-slate-600 rounded-lg text-slate-200 focus:outline-none focus:border-cyan-500 focus:ring-1 focus:ring-cyan-500"
                                    placeholder="Enter Level (optional)">
                            </div>

                            <!-- Subject ID -->
                            <div id="subjectIdField" class="space-y-2">
                                <label for="mapel_id" class="block text-sm font-medium text-slate-300">Subject ID</label>
                                <input type="text" name="mapel_id" id="mapel_id"
                                    class="w-full px-3 py-2 bg-slate-700/50 border border-slate-600 rounded-lg text-slate-200 focus:outline-none focus:border-cyan-500 focus:ring-1 focus:ring-cyan-500"
                                    placeholder="Enter Subject ID (optional)">
                            </div>
                        </div>
                    </div>

                    <!-- Submit -->
                    <div class="flex justify-end p-6 border-t border-slate-700">
                        <button type="submit"
                            class="px-4 py-2 bg-gradient-to-r from-cyan-500 to-blue-500 hover:from-cyan-600 hover:to-blue-600 text-white font-medium rounded-lg transition-all duration-200">
                            Add User
                        </button>
                    </div>
                </form>
            </div>
            <div>
                <h1 class="text-2xl font-bold bg-gradient-to-r from-green-400 to-emerald-400 bg-clip-text text-transparent">
                    Import Users
                </h1>
                <p class="text-slate-400">Upload an Excel file to import multiple users</p>
            </div>
        </div>
    </div>

    <!-- Import Form -->
    <div class="bg-slate-800/50 backdrop-blur-xl border border-slate-700 rounded-xl shadow-xl overflow-hidden">
        <form 
    {{-- action="{{ route('users.import.process') }}" --}}
         method="POST" enctype="multipart/form-data" class="space-y-6">
            @csrf
            <div class="p-6 space-y-6">
                <div class="space-y-2">
                    <label for="excel_file" class="block text-sm font-medium text-slate-300">Excel File</label>
                    <input type="file" name="excel_file" id="excel_file" required
                        class="w-full px-3 py-2 bg-slate-700/50 border border-slate-600 rounded-lg text-slate-200 focus:outline-none focus:border-green-500 focus:ring-1 focus:ring-green-500"
                        accept=".xlsx,.xls,.csv">
                </div>
                <div class="text-sm text-slate-400">
                    <p>Please use the provided Excel template for importing users. You can download the template below.</p>
                </div>
            </div>
            <div class="flex justify-between items-center p-6 border-t border-slate-700">
                <a 
                href="{{ route('users.import.template') }}"
                    class="inline-flex items-center justify-center px-4 py-2 rounded-lg bg-slate-700 hover:bg-slate-600 text-white font-medium transition-all duration-200">
                    Download Template
                </a>
                <button type="submit"
                    class="px-4 py-2 bg-gradient-to-r from-green-500 to-emerald-500 hover:from-green-600 hover:to-emerald-600 text-white font-medium rounded-lg transition-all duration-200">
                    Import Users
                </button>
            </div>
        </form>
    </div>
</div>
        </div>
    </div>

    <script>
        const roleSelect = document.getElementById('role');
        const dataDiriSection = document.getElementById('dataDiriSection');
        const classIdField = document.getElementById('classIdField');
        const levelField = document.getElementById('levelField');
        const subjectIdField = document.getElementById('subjectIdField');

        roleSelect.addEventListener('change', () => {
            const role = roleSelect.value;

            // Reset visibility
            dataDiriSection.style.display = 'block';
            classIdField.style.display = 'block';
            levelField.style.display = 'block';
            subjectIdField.style.display = 'block';

            if (role === 'admin') {
                dataDiriSection.style.display = 'none';
            } else if (role === 'siswa') {
                subjectIdField.style.display = 'none';
            } else if (role === 'guru') {
                classIdField.style.display = 'none';
                levelField.style.display = 'none';
            }
        });
    </script>
@endsection
