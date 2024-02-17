<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Create Dosen') }}
        </h2>
    </x-slot>

    <div class="py-5">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg">
                <x-card title="Tambah Dosen" show-title="true">
                    <x-back-button />
                    <x-custom-form method="post" action="{{ route('dosen-insert') }}">
                        <x-slot name="description">
                            <p>Form ini digunakan untuk mengisi data dosen</p>
                        </x-slot>
                        <x-slot name="form">
                            <!-- Input field for employee address -->
                            <div class="w-full">
                                <x-label for="nidn" value="nidn" />
                                <x-input type="text" id="nidn" name="nidn" />
                                <x-input-error for="nidn" />
                            </div>
                            <div class="w-full">
                                <x-label for="nama" value="nama" />
                                <x-input type="text" id="nama" name="nama" />
                                <x-input-error for="nama" />
                            </div>
                        </x-slot>
                        <!-- Actions for the form -->
                        <x-slot name="actions">
                            <!-- Submit button -->
                            <x-button type="submit">Create Dosen</x-button>
                        </x-slot>
                    </x-custom-form>
                </x-card>
            </div>
        </div>
    </div>
</x-app-layout>
