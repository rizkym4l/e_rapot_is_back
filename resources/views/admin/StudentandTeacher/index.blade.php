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
                                d="M13 6a3 3 0 11-6 0 3 3 0 016 0zM18 8a2 2 0 11-4 0 2 2 0 014 0zM14 15a4 4 0 00-8 0v3h8v-3zM6 8a2 2 0 11-4 0 2 2 0 014 0zM16 18v-3a5.972 5.972 0 00-.75-2.906A3.005 3.005 0 0119 15v3h-3zM4.75 12.094A5.973 5.973 0 004 15v3H1v-3a3 3 0 013.75-2.906z" />
                        </svg>
                    </div>
                    <div>
                        <h1
                            class="text-2xl font-bold bg-gradient-to-r from-cyan-400 to-blue-400 bg-clip-text text-transparent">
                            Teacher and Student Dashboard
                        </h1>
                        <p class="text-slate-400">Manage teachers and students in your system</p>
                    </div>
                </div>
            </div>

            <!-- Teachers Section -->
            <div class="space-y-4">
                <h2 class="text-xl font-semibold text-white">Teachers</h2>

                <!-- Search Teachers -->
                <div class="flex flex-col md:flex-row gap-4">
                    <form action="{{ route('teachers.index') }}" method="GET" class="flex-1">
                        <div class="relative">
                            <svg xmlns="http://www.w3.org/2000/svg"
                                class="h-5 w-5 absolute left-3 top-1/2 transform -translate-y-1/2 text-slate-400"
                                fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                            </svg>
                            <input type="text" name="teacher_search" value="{{ request()->input('teacher_search') }}"
                                class="w-full pl-10 pr-4 py-2 bg-slate-800 border border-slate-700 rounded-lg text-slate-200 placeholder-slate-400 focus:outline-none focus:border-cyan-500 focus:ring-1 focus:ring-cyan-500"
                                placeholder="Search teachers...">
                        </div>
                    </form>
                    <a href="{{ route('teachers.create') }}"
                        class="inline-flex items-center justify-center px-4 py-2 rounded-lg bg-gradient-to-r from-cyan-500 to-blue-500 hover:from-cyan-600 hover:to-blue-600 text-white font-medium transition-all duration-200 group">
                        <svg xmlns="http://www.w3.org/2000/svg"
                            class="h-5 w-5 mr-2 transition-transform group-hover:scale-110" viewBox="0 0 20 20"
                            fill="currentColor">
                            <path fill-rule="evenodd"
                                d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z"
                                clip-rule="evenodd" />
                        </svg>
                        Add Teacher
                    </a>
                </div>

                <!-- Teachers Table -->
                <div class="bg-slate-800/50 backdrop-blur-xl border border-slate-700 rounded-xl shadow-xl overflow-hidden">
                    <div class="overflow-x-auto">
                        <table class="w-full">
                            <thead>
                                <tr class="bg-slate-700/50 text-slate-300 text-sm">
                                    <th class="py-3 px-6 text-left">Name</th>
                                    <th class="py-3 px-6 text-left">Email</th>
                                    <th class="py-3 px-6 text-left">Subject</th>
                                    <th class="py-3 px-6 text-left">Actions</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-slate-700">
                                @forelse ($teachers as $teacher)
                                    <tr class="text-slate-300 hover:bg-slate-700/50 transition-colors duration-200">
                                        <td class="py-3 px-6">{{ $teacher->name }}</td>
                                        <td class="py-3 px-6">{{ $teacher->email }}</td>
                                        <td class="py-3 px-6">{{ $teacher->subject }}</td>
                                        <td class="py-3 px-6">
                                            <div class="flex items-center gap-3">
                                                <a href="{{ route('teachers.edit', $teacher->id) }}"
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
                                                <form action="{{ route('teachers.destroy', $teacher->id) }}" method="POST"
                                                    class="inline-flex"
                                                    onsubmit="return confirm('Are you sure you want to delete this teacher?');">
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
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 text-slate-500"
                                                    fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                                                </svg>
                                                <p>No teachers found.</p>
                                            </div>
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <!-- Students Section -->
            <div class="space-y-4 mt-8">
                <h2 class="text-xl font-semibold text-white">Students</h2>

                <!-- Search Students -->
                <div class="flex flex-col md:flex-row gap-4">
                    <form action="{{ route('students.index') }}" method="GET" class="flex-1">
                        <div class="relative">
                            <svg xmlns="http://www.w3.org/2000/svg"
                                class="h-5 w-5 absolute left-3 top-1/2 transform -translate-y-1/2 text-slate-400"
                                fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                            </svg>
                            <input type="text" name="student_search" value="{{ request()->input('student_search') }}"
                                class="w-full pl-10 pr-4 py-2 bg-slate-800 border border-slate-700 rounded-lg text-slate-200 placeholder-slate-400 focus:outline-none focus:border-cyan-500 focus:ring-1 focus:ring-cyan-500"
                                placeholder="Search students...">
                        </div>
                    </form>
                    <a href="{{ route('students.create') }}"
                        class="inline-flex items-center justify-center px-4 py-2 rounded-lg bg-gradient-to-r from-cyan-500 to-blue-500 hover:from-cyan-600 hover:to-blue-600 text-white font-medium transition-all duration-200 group">
                        <svg xmlns="http://www.w3.org/2000/svg"
                            class="h-5 w-5 mr-2 transition-transform group-hover:scale-110" viewBox="0 0 20 20"
                            fill="currentColor">
                            <path fill-rule="evenodd"
                                d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z"
                                clip-rule="evenodd" />
                        </svg>
                        Add Student
                    </a>
                </div>

                <!-- Students Table -->
                <div class="bg-slate-800/50 backdrop-blur-xl border border-slate-700 rounded-xl shadow-xl overflow-hidden">
                    <div class="overflow-x-auto">
                        <table class="w-full">
                            <thead>
                                <tr class="bg-slate-700/50 text-slate-300 text-sm">
                                    <th class="py-3 px-6 text-left">Name</th>
                                    <th class="py-3 px-6 text-left">Email</th>
                                    <th class="py-3 px-6 text-left">Grade</th>
                                    <th class="py-3 px-6 text-left">Actions</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-slate-700">
                                @forelse ($students as $student)
                                    <tr class="text-slate-300 hover:bg-slate-700/50 transition-colors duration-200">
                                        <td class="py-3 px-6">{{ $student->name }}</td>
                                        <td class="py-3 px-6">{{ $student->email }}</td>
                                        <td class="py-3 px-6">{{ $student->grade }}</td>
                                        <td class="py-3 px-6">
                                            <div class="flex items-center gap-3">
                                                <a href="{{ route('students.edit', $student->id) }}"
                                                    class="inline-flex items-center text-emerald-400 hover:text-emerald-300 transition-colors">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1"
                                                        viewBox="0 0 20 20" fill="currentColor">
                                                        <path
                                                            d="M17.414 2.586a2 2 0 00-2.828 0L7  10.172V13h2.828l7.586-7.586a2 2 0 000-2.828z" />
                                                        <path fill-rule="evenodd"
                                                            d="M2 6a2 2 0 012-2h4a1 1 0 010 2H4v10h10v-4a1 1 0 112 0v4a2 2 0 01-2 2H4a2 2 0 01-2-2V6z"
                                                            clip-rule="evenodd" />
                                                    </svg>
                                                    Edit
                                                </a>
                                                <form action="{{ route('students.destroy', $student->id) }}"
                                                    method="POST" class="inline-flex"
                                                    onsubmit="return confirm('Are you sure you want to delete this student?');">
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
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 text-slate-500"
                                                    fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                                                </svg>
                                                <p>No students found.</p>
                                            </div>
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
