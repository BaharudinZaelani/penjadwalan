<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Create Semester') }}
        </h2>
    </x-slot>

    <div class="py-5">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg">
                <x-card title="Tambah Semester" show-title="true">
                    <x-back-button />
                    <x-custom-form method="post" action="{{ route('semester-insert') }}">
                        <x-slot name="description">
                            <p>Form ini digunakan untuk mengisi data semester</p>
                        </x-slot>
                        <x-slot name="form">
                            <!-- Input field for employee address -->
                            <div class="w-full">
                                <x-label for="tahun" value="tahun" />
                                <x-input type="text" placeholder="{{ $year }}" id="tahun"
                                    name="tahun" />
                                <x-input-error for="tahun" />
                            </div>
                            <div class="w-full">
                                <x-label for="nama" value="nama" />
                                <x-input type="text" placeholder="Semester ..1" id="nama" name="nama" />
                                <x-input-error for="nama" />
                            </div>

                            <div class="w-full">
                                <x-label for="bilangan" value="genap" />
                                <select name="bilangan" id="bilangan"
                                    class='border-gray-300 w-full dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm',>
                                    <option selected>- Pilih Bilangan -</option>
                                    <option value="genap">Genap</option>
                                    <option value="ganjil">Ganjil</option>
                                </select>
                                <x-input-error for="gedung" />
                            </div>
                        </x-slot>
                        <!-- Actions for the form -->
                        <x-slot name="actions">
                            <!-- Submit button -->
                            <x-button type="submit">Create semester</x-button>
                        </x-slot>
                    </x-custom-form>
                </x-card>
            </div>
        </div>
    </div>
</x-app-layout>
