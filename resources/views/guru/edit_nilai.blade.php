@extends('layouts.app')

@section('title', 'Edit Nilai')

@section('contents')
    <div class="container mx-auto px-4 py-8">

        <h1 class="text-4xl font-bold text-center mb-4 text-blue-600 py-10">Edit Nilai</h1>

        <div class="bg-white p-6 rounded-lg shadow-md">
            <h2 class="text-2xl font-semibold text-center text-gray-800 mb-6">Edit Nilai Siswa</h2>

            <form action="{{ route('nilai.update', $nilai->id) }}" method="POST">
                @csrf
                @method('PUT')



                <div class="mb-4">
                    <label for="nilai" class="block text-sm font-medium text-gray-700">Nilai</label>
                    <input type="number" id="nilai" name="nilai" value="{{ old('nilai', $nilai->nilai) }}"
                        class="mt-1 block w-full py-2 px-3 border bg-white border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                </div>



                <div class="flex justify-end">
                    <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md">Update Nilai</button>
                </div>
            </form>
        </div>
    </div>
@endsection
