<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('MataKuliah') }}
        </h2>
    </x-slot>

    <div class="py-5">
        {{-- Header --}}
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
                <x-card title="Matakuliah" show-title="true">
                    <div class="w-full grid grid-cols-2 gap-4">
                        <x-custom-form method="post" action="{{ route('matkul-insert') }}">
                            <x-slot name="form">
                                <div class="w-full">
                                    <x-label for="nama_id" value="Nama Indonesia" />
                                    <x-input type="text" id="nama_id" name="nama_id" />
                                    <x-input-error for="nama_id" />
                                </div>
                                <div class="w-full">
                                    <x-label for="nama_en" value="Nama Inggris" />
                                    <x-input type="text" id="nama_en" name="nama_en" />
                                    <x-input-error for="nama_en" />
                                </div>

                                <div class="w-full">
                                    <x-label for="jurusan_id" value="Jurusan/Program Study" />
                                    <select name="jurusan_id" id="jurusan_id"
                                        class='border-gray-300 w-full dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm',>
                                        <option selected></option>
                                        @foreach ($jurusan as $item)
                                            <option value="{{ $item->id }}">
                                                {{ $item->nama_idn }}
                                            </option>
                                        @endforeach
                                    </select>
                                    <x-input-error for="gedung" />
                                </div>
                                <div class="w-full">
                                    <x-label for="kode_kurikulum" value="Kurikulum" />
                                    <select name="kode_kurikulum" id="kode_kurikulum"
                                        class='border-gray-300 w-full dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm',>
                                        @foreach ($kurikulum as $item)
                                            <option value="{{ $item->id }}">
                                                {{ $item->nama }}
                                            </option>
                                        @endforeach
                                    </select>
                                    <x-input-error for="gedung" />
                                </div>
                                <div class="w-full">
                                    <x-label value="status" />
                                    <div class="flex gap-3 items-center align-center">
                                        <div class="flex items-center gap-2 rounded p-2 shadow">
                                            <x-checkbox type="radio" value="1" id="status_ya" name="status" />
                                            <x-label for="status_ya" value="Ya" />
                                        </div>
                                        <div class="flex items-center gap-2 rounded p-2 shadow">
                                            <x-checkbox type="radio" value="0" id="status_tidak"
                                                name="status" />
                                            <x-label for="status_tidak" value="Tidak" />
                                        </div>
                                    </div>
                                    <x-input-error for="status" />
                                </div>
                            </x-slot>
                            <!-- Actions for the form -->
                            <x-slot name="actions">
                                <!-- Submit button -->
                                <x-button type="submit">Tambah Waktu</x-button>
                            </x-slot>
                        </x-custom-form>
                        @livewire('MatakuliahTable')
                    </div>

                </x-card>
                {{-- Waktu --}}
                <x-card title="Jam Perkuliahan" show-title="true">
                    <div class="w-full grid grid-cols-2 gap-4">
                        <x-custom-form method="post" action="{{ route('waktu-insert') }}">
                            <x-slot name="form">
                                <div class="w-full">
                                    <x-label for="waktu_mulai" value="waktu mulai" />
                                    <x-input type="time" id="waktu_mulai" name="waktu_mulai" />
                                    <x-input-error for="waktu_mulai" />
                                </div>
                                <div class="w-full">
                                    <x-label for="waktu_selesai" value="waktu selesai" />
                                    <x-input type="time" id="waktu_selesai" name="waktu_selesai" />
                                    <x-input-error for="waktu_selesai" />
                                </div>
                            </x-slot>
                            <!-- Actions for the form -->
                            <x-slot name="actions">
                                <!-- Submit button -->
                                <x-button type="submit">Tambah Waktu</x-button>
                            </x-slot>
                        </x-custom-form>
                        @livewire('WaktuTable')

                    </div>
                </x-card>
                <x-card title="Generate Waktu Perkuliahan" show-title="true">
                    <x-custom-form method="post" action="{{ route('jadwal-insert') }}">
                        <x-slot name="description">
                        </x-slot>
                        <x-slot name="form">
                            {{-- Semester --}}
                            <div class="w-full">
                                <div class="mb-4">
                                    <x-label for="semester" value="semester" />
                                    <select name="semester" id="semester"
                                        class='border-gray-300 w-full dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm',>
                                        <option selected value="all">-- Semua Semester --</option>
                                        @foreach ($semester as $smt)
                                            <option value="{{ $smt->id }}">
                                                {{ $smt->tahun . '/' . $smt->nama . '/' . $smt->bilangan }}
                                            </option>
                                        @endforeach
                                    </select>
                                    <x-input-error for="gedung" />
                                </div>
                                <div>
                                    <x-addButton route="semester-insert-index"></x-addButton>
                                </div>
                            </div>

                            {{-- Jurusan --}}
                            <div class="w-full">
                                <x-label for="jurusan" value="jurusan" />
                                <select name="jurusan" id="jurusan (Program Studi)"
                                    class='border-gray-300 w-full dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm',>
                                    <option selected value="all">-- Semua Jurusan --</option>
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
                <x-card title="Jadwal Kuliah" show-title="true">
                    @if (session()->has('jadwalKuliah'))
                        <h1>Preview Penjadwalan</h1>
                        @livewire('JadwalDraftTable')
                        <input type="text" hidden name="save_to_db" value="1">
                        <x-button type="submit" class="bg-green-300 text-black">Simpan</x-button>
                    @else
                        @livewire('JadwalKuliahTable')
                    @endif
                </x-card>
            </div>
        </div>
    </div>

</x-app-layout>
