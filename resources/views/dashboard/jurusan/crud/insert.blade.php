<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Create Jurusan') }}
        </h2>
    </x-slot>

    <div class="py-5">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg">
                <x-card title="Tambah Jurusan" show-title="true">
                    <x-back-button />
                    <x-custom-form method="post" action="{{ route('jurusan-insert') }}">
                        <x-slot name="description">
                            <p>Form ini digunakan untuk mengisi data Jurusan</p>
                        </x-slot>
                        <x-slot name="form">
                            <!-- Input field -->
                            <div class="w-full">
                                <x-label for="nama_idn" value="nama (indonesia)" />
                                <x-input type="text" id="nama_idn" name="nama_idn" />
                                <x-input-error for="nama_idn" />
                            </div>

                            <div class="w-full">
                                <x-label for="nama_en" value="nama (Inggris)" />
                                <x-input type="text" id="nama_en" name="nama_en" />
                                <x-input-error for="nama_en" />
                            </div>

                            <div class="w-full">
                                <x-label for="bidang_keahlian" value="bidang_keahlian" />
                                <x-input type="text" id="bidang_keahlian" name="bidang_keahlian" />
                                <x-input-error for="bidang_keahlian" />
                            </div>

                            <div class="w-full">
                                <x-label for="kompetensi_umum" value="kompetensi_umum" />
                                <x-input type="text" id="kompetensi_umum" name="kompetensi_umum" />
                                <x-input-error for="kompetensi_umum" />
                            </div>

                            <div class="w-full">
                                <x-label for="kompetensi_khusus" value="kompetensi_khusus" />
                                <x-input type="text" id="kompetensi_khusus" name="kompetensi_khusus" />
                                <x-input-error for="kompetensi_khusus" />
                            </div>

                            <div class="w-full">
                                <x-label for="pejabat" value="Pejabat" />
                                <select name="pejabat" id="pejabat"
                                    class='border-gray-300 w-full dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm',>
                                    <option selected>- Pilih Pejabat -</option>
                                    @foreach ($dosen as $item)
                                        <option value="{{ $item->id }}">{{ $item->nama }}</option>
                                    @endforeach
                                </select>
                                <x-input-error for="gedung" />
                            </div>

                            <div class="w-full">
                                <x-label for="jabatan" value="jabatan" />
                                <x-input type="text" id="jabatan" name="jabatan" />
                                <x-input-error for="jabatan" />
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
                            <x-button type="submit">Create Gedung</x-button>
                        </x-slot>
                    </x-custom-form>
                </x-card>
            </div>
        </div>
    </div>
</x-app-layout>
