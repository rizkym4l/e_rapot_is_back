@extends('layouts.main')

@section('contentAdmin')
    <div class="min-h-screen bg-slate-900 p-6">
        <div class="container mx-auto space-y-6">
            <!-- Header Section -->
            <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4">
                <h2 class="text-2xl font-bold bg-gradient-to-r from-cyan-400 to-blue-400 bg-clip-text text-transparent">
                    Class
                </h2>
                <a href="{{ route('kelas.create') }}"
                    class="inline-flex items-center justify-center px-4 py-2 rounded-lg bg-gradient-to-r from-cyan-500 to-blue-500 hover:from-cyan-600 hover:to-blue-600 text-white font-medium transition-all duration-200 group">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 transition-transform group-hover:scale-110"
                        viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd"
                            d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z"
                            clip-rule="evenodd" />
                    </svg>
                    Add Class
                </a>
            </div>

            <!-- Search Section -->
            <div class="flex flex-col md:flex-row gap-4">
                <form action="{{ route('kelas.index') }}" method="GET" class="flex-1">
                    <div class="relative">
                        <svg xmlns="http://www.w3.org/2000/svg"
                            class="h-5 w-5 absolute left-3 top-1/2 transform -translate-y-1/2 text-slate-400" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                        </svg>
                        <input type="text" name="search" id="search"
                            class="w-full pl-10 pr-4 py-2 bg-slate-800 border border-slate-700 rounded-lg text-slate-200 placeholder-slate-400 focus:outline-none focus:border-cyan-500 focus:ring-1 focus:ring-cyan-500"
                            placeholder="Search Kelas..." value="{{ request()->input('search') }}">
                    </div>
                </form>
            </div>

            <!-- Table Card -->
            <div class="bg-slate-800 rounded-xl border border-slate-700 shadow-xl overflow-hidden">
                <div class="p-6 border-b border-slate-700">
                    <h3 class="text-lg font-semibold text-white">List of Classes</h3>
                </div>

                <div class="overflow-x-auto">
                    <table class="w-full">
                        <thead>
                            <tr class="bg-slate-700/50 text-slate-300 text-sm">
                                <th class="py-3 px-6 text-left">Nama Kelas</th>
                                <th class="py-3 px-6 text-left">Tingkat</th>
                                <th class="py-3 px-6 text-left">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-slate-700">
                            @forelse ($kelas as $kls)
                                <tr class="text-slate-300 hover:bg-slate-700/50 transition-colors duration-200">
                                    <td class="py-3 px-6">{{ $kls->nama_kelas }}</td>
                                    <td class="py-3 px-6">
                                        <span class="px-2 py-1 rounded-full text-sm bg-slate-700 text-white">
                                            {{ $kls->tingkat }}
                                        </span>
                                    </td>
                                    <td class="py-3 px-6">
                                        <div class="flex items-center gap-3">
                                            <a href="{{ route('kelas.edit', $kls->id) }}"
                                                class="inline-flex items-center text-emerald-400 hover:text-emerald-300 transition-colors">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1"
                                                    viewBox="0 0 20 20" fill="currentColor">
                                                    <path
                                                        d="M17.414 2.586a2 2 0 00-2.828 0L7 10.172V13h2.828l7.586-7.586a2 2 0 000-2.828z" />
                                                    <path fill-rule="evenodd"
                                                        d="M2 6a2 2 0 012-2h4a1 1 0 010 2H4v10h10v-4a1 1 0 112 0v4a2 2 0 01-2 2H4a2 2 0 01-2-2V6z"
                                                        clip-rule="evenodd" />
                                                </svg>
                                                Edit
                                            </a>
                                            <form action="{{ route('kelas.destroy', $kls->id) }}" method="POST"
                                                class="inline-flex"
                                                onsubmit="return confirm('Are you sure you want to delete this class?');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit"
                                                    class="inline-flex items-center text-red-400 hover:text-red-300 transition-colors">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1"
                                                        viewBox="0 0 20 20" fill="currentColor">
                                                        <path fill-rule="evenodd"
                                                            d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z"
                                                            clip-rule="evenodd" />
                                                    </svg>
                                                    Delete
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="3" class="py-8 text-center text-slate-400">
                                        <div class="flex flex-col items-center justify-center space-y-3">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 text-slate-500"
                                                fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" />
                                            </svg>
                                            <p>No Kelas found.</p>
                                        </div>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                <!-- Pagination -->
                <div class="p-4 border-t border-slate-700">
                    {{ $kelas->links() }}
                </div>
            </div>
        </div>
    </div>

    <script>
        // Debounce function to limit API calls
        function debounce(func, wait) {
            let timeout;
            return function executedFunction(...args) {
                const later = () => {
                    clearTimeout(timeout);
                    func(...args);
                };
                clearTimeout(timeout);
                timeout = setTimeout(later, wait);
            };
        }

        // Enhanced search functionality with loading state
        document.getElementById('search').addEventListener('input', debounce(function() {
            const query = this.value;
            const tableBody = document.querySelector('tbody');

            // Add loading state
            tableBody.innerHTML = `
            <tr>
                <td colspan="3" class="py-8 text-center text-slate-400">
                    <div class="flex flex-col items-center justify-center space-y-3">
                        <svg class="animate-spin h-8 w-8 text-cyan-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                            <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                            <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                        </svg>
                        <p>Searching...</p>
                    </div>
                </td>
            </tr>
        `;

            fetch(`/kelas/search?search=${query}`)
                .then(response => response.json())
                .then(data => {
                    tableBody.innerHTML = '';

                    if (data.length > 0) {
                        data.forEach(kelas => {
                            const row = `
                            <tr class="text-slate-300 hover:bg-slate-700/50 transition-colors duration-200">
                                <td class="py-3 px-6">${kelas.nama_kelas}</td>
                                <td class="py-3 px-6">
                                    <span class="px-2 py-1 rounded-full text-sm bg-slate-700 text-white">
                                        ${kelas.tingkat}
                                    </span>
                                </td>
                                <td class="py-3 px-6">
                                    <div class="flex items-center gap-3">
                                        <a href="/kelas/${kelas.id}/edit" 
                                           class="inline-flex items-center text-emerald-400 hover:text-emerald-300 transition-colors">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" viewBox="0 0 20 20" fill="currentColor">
                                                <path d="M17.414 2.586a2 2 0 00-2.828 0L7 10.172V13h2.828l7.586-7.586a2 2 0 000-2.828z" />
                                                <path fill-rule="evenodd" d="M2 6a2 2 0 012-2h4a1 1 0 010 2H4v10h10v-4a1 1 0 112 0v4a2 2 0 01-2 2H4a2 2 0 01-2-2V6z" clip-rule="evenodd" />
                                            </svg>
                                            Edit
                                        </a>
                                        <form action="/kelas/${kelas.id}" 
                                              method="POST"
                                              class="inline-flex"
                                              onsubmit="return confirm('Are you sure you want to delete this class?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" 
                                                    class="inline-flex items-center text-red-400 hover:text-red-300 transition-colors">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" viewBox="0 0 20 20" fill="currentColor">
                                                    <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd" />
                                                </svg>
                                                Delete
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        `;
                            tableBody.innerHTML += row;
                        });
                    } else {
                        tableBody.innerHTML = `
                        <tr>
                            <td colspan="3" class="py-8 text-center text-slate-400">
                                <div class="flex flex-col items-center justify-center space-y-3">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 text-slate-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" />
                                    
                                    </svg>
                                    <p>No Kelas found.</p>
                                </div>
                            </td>
                        </tr>
                    `;
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    tableBody.innerHTML = `
                    <tr>
                        <td colspan="3" class="py-8 text-center text-red-400">
                            <div class="flex flex-col items-center justify-center space-y-3">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                                <p>An error occurred while searching. Please try again.</p>
                            </div>
                        </td>
                    </tr>
                `;
                });
        }, 300));
    </script>
@endsection
