<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Kurikulum') }}
        </h2>
    </x-slot>

    <div class="py-5">
        <div class="max-w-7xl mb-3 mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg">
                <x-navmenu />
            </div>
        </div>

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg">
                <x-card title="kurikulum Page">
                    <x-addButton route="kurikulum-insert-index" />
                    @livewire('KurikulumTable')
                </x-card>
            </div>
        </div>
    </div>
</x-app-layout>