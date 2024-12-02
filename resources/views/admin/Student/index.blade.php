@extends('layouts.main')

@section('contentAdmin')
<div class="min-h-screen bg-slate-900 p-6">
    <div class="container mx-auto space-y-6">
        <!-- Alert Messages -->
        @if (session('success'))
            <!-- Similar Alert Component -->
        @endif
        @if (session('error'))
            <!-- Similar Alert Component -->
        @endif

        <!-- Header -->
        <div class="bg-slate-800/50 backdrop-blur-xl border border-slate-700 p-6 rounded-xl shadow-xl">
            <div class="flex items-center gap-4">
                <div class="p-3 rounded-xl bg-cyan-900/50 border border-cyan-700/50 text-cyan-400">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" viewBox="0 0 20 20" fill="currentColor">
                        <path
                            d="M8 3a2 2 0 100 4 2 2 0 000-4zM11 9a5 5 0 00-5 5v3h10v-3a5 5 0 00-5-5z" />
                    </svg>
                </div>
                <div>
                    <h1 class="text-2xl font-bold bg-gradient-to-r from-cyan-400 to-blue-400 bg-clip-text text-transparent">
                        Students Management Dashboard
                    </h1>
                    <p class="text-slate-400">Manage students' data and records</p>
                </div>
            </div>
        </div>

        <!-- Search and Add Student -->
        <div class="flex flex-col md:flex-row gap-4">
            <form action="{{ route('admin.students') }}" method="GET" class="flex-1">
                <div class="relative">
                    <input type="text" name="search" value="{{ request()->input('search') }}"
                        class="w-full pl-10 pr-4 py-2 bg-slate-800 border border-slate-700 rounded-lg text-slate-200 placeholder-slate-400 focus:outline-none focus:border-cyan-500 focus:ring-1 focus:ring-cyan-500"
                        placeholder="Search by name or class">
                </div>
            </form>
            <a href="{{ route('students.create') }}"
                class="inline-flex items-center justify-center px-4 py-2 rounded-lg bg-gradient-to-r from-cyan-500 to-blue-500 hover:from-cyan-600 hover:to-blue-600 text-white font-medium transition-all duration-200">
                Add Student
            </a>
        </div>

        <!-- Students Table -->
        <div class="bg-slate-800/50 backdrop-blur-xl border border-slate-700 rounded-xl shadow-xl overflow-hidden">
            <div class="p-6 border-b border-slate-700">
                <h2 class="text-lg font-semibold text-white">Students List</h2>
            </div>
            <div class="overflow-x-auto">
                <table class="w-full">
                    <thead>
                        <tr class="bg-slate-700/50 text-slate-300 text-sm">
                            <th class="py-3 px-6 text-left">Name</th>
                            <th class="py-3 px-6 text-left">Class</th>
                            <th class="py-3 px-6 text-left">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-700">
                        @forelse ($students as $student)
                            <tr class="text-slate-300 hover:bg-slate-700/50 transition-colors duration-200">
                                <td class="py-3 px-6">{{ $student->name }}</td>
                                <td class="py-3 px-6">{{ $student->class }}</td>
                                <td class="py-3 px-6">
                                    <div class="flex items-center gap-3">
                                        <a href="{{ route('students.edit', $student->id) }}" class="text-emerald-400 hover:text-emerald-300">Edit</a>
                                        <form action="{{ route('students.destroy', $student->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-red-400 hover:text-red-300">Delete</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="3" class="py-8 text-center text-slate-400">No students found.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            <div class="p-4 border-t border-slate-700">
                {{ $students->links() }}
            </div>
        </div>
    </div>
</div>
@endsection
