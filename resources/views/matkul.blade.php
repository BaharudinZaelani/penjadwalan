<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('MataKuliah') }}
        </h2>
    </x-slot>

    <div class="py-5">
        <div class="max-w-7xl mb-3 mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg p-5">
                <div class="lg:flex max-[680px]:grid max-[680px]:grid-cols-2 gap-3">
                    {{-- Dosen --}}
                    <a href="{{ route('dosen-index') }}" class="rounded border p-2 flex gap-2 align-center items-center">
                        <i class="fa-solid fa-user"></i>
                        <h1 class="capitalize">Dosen :</h1>
                        <h1 class="capitalize">{{ $dosen->count() }}</h1>
                    </a>
                    {{-- gedung --}}
                    <a href="{{ route('gedung-index') }}"
                        class="rounded border p-2 flex gap-2 align-center items-center">
                        <i class="fa-solid fa-building-user"></i>
                        <h1 class="capitalize">gedung :</h1>
                        <h1 class="capitalize">{{ $gedung->count() }}</h1>
                    </a>
                    {{-- ruangan --}}
                    <a href="{{ route('ruangan-index') }}"
                        class="rounded border p-2 flex gap-2 align-center items-center">
                        <i class="fa-solid fa-people-roof"></i>
                        <h1 class="capitalize">ruangan :</h1>
                        <h1 class="capitalize">{{ $ruangan->count() }}</h1>
                    </a>
                    {{-- jurusan --}}
                    <a href="{{ route('jurusan-index') }}"
                        class="rounded border p-2 flex gap-2 align-center items-center">
                        <i class="fa-solid fa-laptop-code"></i>
                        <h1 class="capitalize">jurusan :</h1>
                        <h1 class="capitalize">{{ $jurusan->count() }}</h1>
                    </a>
                    {{-- kelas --}}
                    <a href="{{ route('kelas-index') }}"
                        class="rounded border p-2 flex gap-2 align-center items-center">
                        <i class="fa-solid fa-chalkboard-user"></i>
                        <h1 class="capitalize">kelas :</h1>
                        <h1 class="capitalize">{{ $kelas->count() }}</h1>
                    </a>
                    {{-- kurikulum --}}
                    <a href="{{ route('kurikulum-index') }}"
                        class="rounded border p-2 flex gap-2 align-center items-center">
                        <i class="fa-solid fa-chalkboard-user"></i>
                        <h1 class="capitalize">kurikulum :</h1>
                        <h1 class="capitalize">{{ $kurikulum->count() }}</h1>
                    </a>
                </div>
            </div>
        </div>

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg">
                <x-card title="Generate Matakuliah" show-title="true">
                    <x-custom-form method="post" action="{{ route('gedung-index') }}">
                        <x-slot name="description">
                        </x-slot>
                        <x-slot name="form">
                            <!-- Input field for employee address -->
                            <div class="w-full">
                                <x-label for="semester" value="semester" />
                                <select name="semester" id="semester"
                                    class='border-gray-300 w-full dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm',>
                                    <option selected value="1">Semester 1</option>
                                    <option value="2">Semester 2</option>
                                    <option value="3">Semester 3</option>
                                    <option value="4">Semester 4</option>
                                    <option value="5">Semester 5</option>
                                    <option value="6">Semester 6</option>
                                    <option value="7">Semester 7</option>
                                    <option value="8">Semester 8</option>
                                </select>
                                <x-input-error for="gedung" />
                            </div>

                            <div class="w-full">
                                <x-label for="jurusan" value="jurusan" />
                                <select name="jurusan" id="jurusan (Program Studi)"
                                    class='border-gray-300 w-full dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm',>
                                    <option selected value="auto">Semua Jurusan</option>
                                    @foreach ($jurusan as $item)
                                        <option value="{{ $item->id }}">{{ $item->nama_idn }}</option>
                                    @endforeach
                                </select>
                                <x-input-error for="gedung" />
                            </div>
                        </x-slot>
                        <!-- Actions for the form -->
                        <x-slot name="actions">
                            <!-- Submit button -->
                            <x-button type="submit">GENERATE</x-button>
                        </x-slot>
                    </x-custom-form>
                </x-card>
            </div>
        </div>
    </div>

    <div class="py-5">

    </div>
</x-app-layout>
