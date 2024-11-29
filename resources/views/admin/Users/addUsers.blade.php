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

            <!-- Add User Form -->
            <div class="bg-slate-800/50 backdrop-blur-xl border border-slate-700 rounded-xl shadow-xl overflow-hidden">
                <div class="p-6 border-b border-slate-700">
                    <h2 class="text-lg font-semibold text-white">User Details</h2>
                </div>

                <form action="{{ route('users.store') }}" method="POST" enctype="multipart/form-data"
                    class="p-6 space-y-6">
                    @csrf
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div class="space-y-2">
                            <label for="name" class="block text-sm font-medium text-slate-300">Name</label>
                            <input type="text" name="name" id="name" required
                                class="w-full px-3 py-2 bg-slate-700/50 border border-slate-600 rounded-lg text-slate-200 placeholder-slate-400 focus:outline-none focus:border-cyan-500 focus:ring-1 focus:ring-cyan-500"
                                placeholder="Enter user's name">
                        </div>

                        <div class="space-y-2">
                            <label for="email" class="block text-sm font-medium text-slate-300">Email</label>
                            <input type="email" name="email" id="email" required
                                class="w-full px-3 py-2 bg-slate-700/50 border border-slate-600 rounded-lg text-slate-200 placeholder-slate-400 focus:outline-none focus:border-cyan-500 focus:ring-1 focus:ring-cyan-500"
                                placeholder="Enter user's email">
                        </div>

                        <div class="space-y-2">
                            <label for="password" class="block text-sm font-medium text-slate-300">Password</label>
                            <input type="password" name="password" id="password" required
                                class="w-full px-3 py-2 bg-slate-700/50 border border-slate-600 rounded-lg text-slate-200 placeholder-slate-400 focus:outline-none focus:border-cyan-500 focus:ring-1 focus:ring-cyan-500"
                                placeholder="Create a password">
                        </div>

                        <div class="space-y-2">
                            <label for="role" class="block text-sm font-medium text-slate-300">Role</label>
                            <select name="role" id="role" required
                                class="w-full px-3 py-2 bg-slate-700/50 border border-slate-600 rounded-lg text-slate-200 focus:outline-none focus:border-cyan-500 focus:ring-1 focus:ring-cyan-500">
                                <option value="admin">Admin</option>
                                <option value="siswa">Siswa</option>
                                <option value="guru">Guru</option>
                            </select>
                        </div>
                    </div>

                    <div class="space-y-2">
                        <label for="photo" class="block text-sm font-medium text-slate-300">Photo</label>
                        <div class="flex items-center space-x-4">
                            <div
                                class="w-16 h-16 bg-slate-700/50 border border-slate-600 rounded-lg flex items-center justify-center">
                                <svg class="w-8 h-8 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z">
                                    </path>
                                </svg>
                            </div>
                            <input type="file" name="photo" id="photo" accept="image/*"
                                class="block w-full text-sm text-slate-400
                                file:mr-4 file:py-2 file:px-4
                                file:rounded-lg file:border-0
                                file:text-sm file:font-medium
                                file:bg-cyan-900/50 file:text-cyan-400
                                hover:file:bg-cyan-900
                                file:cursor-pointer file:transition-colors">
                        </div>
                    </div>

                    <div class="flex justify-end">
                        <button type="submit"
                            class="px-4 py-2 bg-gradient-to-r from-cyan-500 to-blue-500 hover:from-cyan-600 hover:to-blue-600 text-white font-medium rounded-lg transition-all duration-200">
                            Add User
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
