<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Create Ruangan') }}
        </h2>
    </x-slot>

    <div class="py-5">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg">
                <x-card title="Tambah Ruangan" show-title="true">
                    <x-back-button />
                    <x-custom-form method="post" action="{{ route('ruangan-insert') }}">
                        <x-slot name="description">
                            <p>Form ini digunakan untuk mengisi data Ruangan</p>
                        </x-slot>
                        <x-slot name="form">
                            <!-- Input field -->
                            <div class="w-full">
                                <x-label for="kode_gedung" value="Gedung" />
                                <select name="kode_gedung" id="kode_gedung"
                                    class='border-gray-300 w-full dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm',>
                                    <option selected>- Pilih Gedung -</option>
                                    @foreach ($gedung as $item)
                                        <option value="{{ $item->id }}">{{ $item->nama }}</option>
                                    @endforeach
                                </select>
                                <x-input-error for="gedung" />
                            </div>

                            <div class="w-full">
                                <x-label for="nama" value="nama" />
                                <x-input type="text" id="nama" name="nama" />
                                <x-input-error for="nama" />
                            </div>

                            <div class="w-full">
                                <x-label for="kapasitas_belajar" value="Kapasitas belajar" />
                                <x-input type="text" id="kapasitas_belajar" name="kapasitas_belajar" />
                                <x-input-error for="kapasitas_belajar" />
                            </div>

                            <div class="w-full">
                                <x-label for="kapasitas_ujian" value="kapasitas ujian" />
                                <x-input type="text" id="kapasitas_ujian" name="kapasitas_ujian" />
                                <x-input-error for="kapasitas_ujian" />
                            </div>

                            <div class="w-full">
                                <x-label for="keterangan" value="keterangan" />
                                <x-input type="text" id="keterangan" name="keterangan" />
                                <x-input-error for="keterangan" />
                            </div>

                            <div class="w-full">
                                <x-label value="status" />
                                <div class="flex gap-3 items-center align-center">
                                    <div class="flex items-center gap-2 rounded p-2 shadow">
                                        <x-checkbox type="radio" value="1" id="status_ya" name="status" />
                                        <x-label for="status_ya" value="Ya" />
                                    </div>
                                    <div class="flex items-center gap-2 rounded p-2 shadow">
                                        <x-checkbox type="radio" value="0" id="status_tidak" name="status" />
                                        <x-label for="status_tidak" value="Tidak" />
                                    </div>
                                </div>
                                <x-input-error for="status" />
                            </div>

                        </x-slot>
                        <!-- Actions for the form -->
                        <x-slot name="actions">
                            <!-- Submit button -->
                            <x-button type="submit">Create Ruangan</x-button>
                        </x-slot>
                    </x-custom-form>
                </x-card>
            </div>
        </div>
    </div>
</x-app-layout>
