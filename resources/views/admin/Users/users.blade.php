@extends('layouts.main')

@section('contentAdmin')
    <div class="min-h-screen bg-slate-900 p-6">
        <div class="container mx-auto space-y-6">
            <!-- Alert Messages -->
            @if (session('success'))
                <div class="relative bg-emerald-900/50 text-emerald-200 px-6 py-4 rounded-lg border border-emerald-700/50 backdrop-blur-sm"
                    role="alert" x-data="{ show: true }" x-show="show" x-transition:enter="transition ease-out duration-300"
                    x-transition:enter-start="opacity-0 transform -translate-y-2"
                    x-transition:enter-end="opacity-100 transform translate-y-0">
                    <div class="flex items-center gap-3">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-emerald-400" viewBox="0 0 20 20"
                            fill="currentColor">
                            <path fill-rule="evenodd"
                                d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                clip-rule="evenodd" />
                        </svg>
                        <div>
                            <p class="font-medium">Success!</p>
                            <p class="text-emerald-300">{{ session('success') }}</p>
                        </div>
                    </div>
                    <button @click="show = false" class="absolute top-4 right-4 text-emerald-400 hover:text-emerald-300">
                        <svg class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd"
                                d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                clip-rule="evenodd" />
                        </svg>
                    </button>
                </div>
            @endif

            @if (session('error'))
                <div class="relative bg-red-900/50 text-red-200 px-6 py-4 rounded-lg border border-red-700/50 backdrop-blur-sm"
                    role="alert" x-data="{ show: true }" x-show="show"
                    x-transition:enter="transition ease-out duration-300"
                    x-transition:enter-start="opacity-0 transform -translate-y-2"
                    x-transition:enter-end="opacity-100 transform translate-y-0">
                    <div class="flex items-center gap-3">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-red-400" viewBox="0 0 20 20"
                            fill="currentColor">
                            <path fill-rule="evenodd"
                                d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z"
                                clip-rule="evenodd" />
                        </svg>
                        <div>
                            <p class="font-medium">Error!</p>
                            <p class="text-red-300">{{ session('error') }}</p>
                        </div>
                    </div>
                    <button @click="show = false" class="absolute top-4 right-4 text-red-400 hover:text-red-300">
                        <svg class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd"
                                d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                clip-rule="evenodd" />
                        </svg>
                    </button>
                </div>
            @endif

            <!-- Header -->
            <div class="bg-slate-800/50 backdrop-blur-xl border border-slate-700 p-6 rounded-xl shadow-xl">
                <div class="flex items-center gap-4">
                    <div class="p-3 rounded-xl bg-cyan-900/50 border border-cyan-700/50 text-cyan-400">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" viewBox="0 0 20 20" fill="currentColor">
                            <path
                                d="M13 6a3 3 0 11-6 0 3 3 0 016 0zM18 8a2 2 0 11-4 0 2 2 0 014 0zM14 15a4 4 0 00-8 0v3h8v-3zM6 8a2 2 0 11-4 0 2 2 0 014 0zM16 18v-3a5.972 5.972 0 00-.75-2.906A3.005 3.005 0 0119 15v3h-3zM4.75 12.094A5.973 5.973 0 004 15v3H1v-3a3 3 0 013.75-2.906z" />
                        </svg>
                    </div>
                    <div>
                        <h1
                            class="text-2xl font-bold bg-gradient-to-r from-cyan-400 to-blue-400 bg-clip-text text-transparent">
                            User Management Dashboard
                        </h1>
                        <p class="text-slate-400">Manage your system users and their roles</p>
                    </div>
                </div>
            </div>

            <!-- Search and Add User -->
            <div class="flex flex-col md:flex-row gap-4">
                <form action="{{ route('admin.users') }}" method="GET" class="flex-1">
                    <div class="relative">
                        <svg xmlns="http://www.w3.org/2000/svg"
                            class="h-5 w-5 absolute left-3 top-1/2 transform -translate-y-1/2 text-slate-400" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                        </svg>
                        <input type="text" name="search" value="{{ request()->input('search') }}"
                            class="w-full pl-10 pr-4 py-2 bg-slate-800 border border-slate-700 rounded-lg text-slate-200 placeholder-slate-400 focus:outline-none focus:border-cyan-500 focus:ring-1 focus:ring-cyan-500"
                            placeholder="Search by name or email">
                    </div>
                </form>
                <a href="{{ route('users.create') }}"
                    class="inline-flex items-center justify-center px-4 py-2 rounded-lg bg-gradient-to-r from-cyan-500 to-blue-500 hover:from-cyan-600 hover:to-blue-600 text-white font-medium transition-all duration-200 group">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 transition-transform group-hover:scale-110"
                        viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd"
                            d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z"
                            clip-rule="evenodd" />
                    </svg>
                    Add User
                </a>
            </div>

            <!-- Users Table -->
            <div class="bg-slate-800/50 backdrop-blur-xl border border-slate-700 rounded-xl shadow-xl overflow-hidden">
                <div class="p-6 border-b border-slate-700">
                    <h2 class="text-lg font-semibold text-white">Users List</h2>
                </div>

                <div class="overflow-x-auto">
                    <table class="w-full">
                        <thead>
                            <tr class="bg-slate-700/50 text-slate-300 text-sm">
                                <th class="py-3 px-6 text-left">Name</th>
                                <th class="py-3 px-6 text-left">Email</th>
                                <th class="py-3 px-6 text-left">Role</th>
                                <th class="py-3 px-6 text-left">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-slate-700">
                            @forelse ($users as $user)
                                <tr class="text-slate-300 hover:bg-slate-700/50 transition-colors duration-200">
                                    <td class="py-3 px-6">
                                        <div class="flex items-center gap-3">
                                            <div
                                                class="flex-shrink-0 h-10 w-10 rounded-full bg-slate-700 border border-slate-600 flex items-center justify-center">
                                                <span class="text-sm font-medium text-slate-300">
                                                    {{ substr($user->name, 0, 2) }}
                                                </span>
                                            </div>
                                            <span class="font-medium">{{ $user->name }}</span>
                                        </div>
                                    </td>
                                    <td class="py-3 px-6">{{ $user->email }}</td>
                                    <td class="py-3 px-6">
                                        <span
                                            class="px-2 py-1 rounded-full text-sm 
                                        {{ $user->role === 'admin'
                                            ? 'bg-purple-900/50 text-purple-300 border border-purple-700/50'
                                            : 'bg-slate-700/50 text-slate-300 border border-slate-600' }}">
                                            {{ $user->role }}
                                        </span>
                                    </td>
                                    <td class="py-3 px-6">
                                        <div class="flex items-center gap-3">
                                            <a href="{{ route('users.edit', $user->id) }}"
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
                                            <form action="{{ route('users.destroy', $user->id) }}" method="POST"
                                                class="inline-flex"
                                                onsubmit="return confirm('Are you sure you want to delete this user?');">
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
                                    <td colspan="4" class="py-8 text-center text-slate-400">
                                        <div class="flex flex-col items-center justify-center space-y-3">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12  text-slate-500"
                                                fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                                            </svg>
                                            <p>No users found.</p>
                                        </div>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                <!-- Pagination -->
                <div class="p-4 border-t border-slate-700">
                    {{ $users->appends(['search' => request()->input('search')])->links() }}
                </div>
            </div>
        </div>
    </div>

    <script>
        // Close alerts after 5 seconds
        setTimeout(() => {
            const alerts = document.querySelectorAll('[role="alert"]');
            alerts.forEach(alert => {
                alert.style.opacity = '0';
                alert.style.transform = 'translateY(-1rem)';
                setTimeout(() => alert.remove(), 300);
            });
        }, 5000);
    </script>
@endsection
