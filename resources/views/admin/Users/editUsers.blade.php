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
                            Edit User
                        </h1>
                        <p class="text-slate-400">Update user information</p>
                    </div>
                </div>
            </div>

            <!-- Edit User Form -->
            <div class="bg-slate-800/50 backdrop-blur-xl border border-slate-700 rounded-xl shadow-xl overflow-hidden">
                <div class="p-6 border-b border-slate-700">
                    <h2 class="text-lg font-semibold text-white">User Details</h2>
                </div>

                <form action="{{ route('users.update', $user->id) }}" method="POST" class="p-6 space-y-6">
                    @csrf
                    @method('PUT')

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div class="space-y-2">
                            <label for="name" class="block text-sm font-medium text-slate-300">Name</label>
                            <input type="text" name="name" id="name" value="{{ old('name', $user->name) }}"
                                class="w-full px-3 py-2 bg-slate-700/50 border border-slate-600 rounded-lg text-slate-200 placeholder-slate-400 focus:outline-none focus:border-cyan-500 focus:ring-1 focus:ring-cyan-500">
                            @error('name')
                                <span class="text-red-400 text-sm">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="space-y-2">
                            <label for="email" class="block text-sm font-medium text-slate-300">Email</label>
                            <input type="email" name="email" id="email" value="{{ old('email', $user->email) }}"
                                class="w-full px-3 py-2 bg-slate-700/50 border border-slate-600 rounded-lg text-slate-200 placeholder-slate-400 focus:outline-none focus:border-cyan-500 focus:ring-1 focus:ring-cyan-500">
                            @error('email')
                                <span class="text-red-400 text-sm">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="space-y-2">
                            <label for="role" class="block text-sm font-medium text-slate-300">Role</label>
                            <select name="role" id="role"
                                class="w-full px-3 py-2 bg-slate-700/50 border border-slate-600 rounded-lg text-slate-200 focus:outline-none focus:border-cyan-500 focus:ring-1 focus:ring-cyan-500">
                                <option value="admin" {{ $user->role == 'admin' ? 'selected' : '' }}>Admin</option>
                                <option value="siswa" {{ $user->role == 'siswa' ? 'selected' : '' }}>Siswa</option>
                                <option value="guru" {{ $user->role == 'guru' ? 'selected' : '' }}>Guru</option>
                            </select>
                            @error('role')
                                <span class="text-red-400 text-sm">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="space-y-2">
                            <label for="password" class="block text-sm font-medium text-slate-300">Password</label>
                            <input type="password" name="password" id="password"
                                class="w-full px-3 py-2 bg-slate-700/50 border border-slate-600 rounded-lg text-slate-200 placeholder-slate-400 focus:outline-none focus:border-cyan-500 focus:ring-1 focus:ring-cyan-500"
                                placeholder="Leave blank to keep current password">
                            @error('password')
                                <span class="text-red-400 text-sm">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="space-y-2">
                            <label for="password_confirmation" class="block text-sm font-medium text-slate-300">Confirm
                                Password</label>
                            <input type="password" name="password_confirmation" id="password_confirmation"
                                class="w-full px-3 py-2 bg-slate-700/50 border border-slate-600 rounded-lg text-slate-200 placeholder-slate-400 focus:outline-none focus:border-cyan-500 focus:ring-1 focus:ring-cyan-500"
                                placeholder="Confirm new password">
                        </div>
                    </div>

                    <div class="flex justify-end">
                        <button type="submit"
                            class="px-4 py-2 bg-gradient-to-r from-cyan-500 to-blue-500 hover:from-cyan-600 hover:to-blue-600 text-white font-medium rounded-lg transition-all duration-200">
                            Update User
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
