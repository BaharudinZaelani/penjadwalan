<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dosen') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mb-3 mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg">
                <x-navmenu />
            </div>
        </div>

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg">
                <x-card title="Dosen Page">
                    <a href="{{ route('dosen-create-index') }}"
                        class="p-2 rounded text-white bg-green-500 hover:bg-green-400">
                        <i class="fa-solid fa-add"></i>
                        <span>Tambah Dosen</span>
                    </a>
                    <div class="mt-2">
                        @livewire('DosenTable')
                    </div>
                </x-card>
            </div>
        </div>
    </div>
</x-app-layout>
