@props(['method', 'action'])

<form class="mt-5" method="{{ $method }}" action="{{ $action }}">
    @csrf
    <div
        class="px-4 py-5 bg-white dark:bg-gray-800 sm:p-6 shadow {{ isset($actions) ? 'sm:rounded-tl-md sm:rounded-tr-md' : 'sm:rounded-md' }}">
        <div {{ $attributes->merge(['class' => 'max-[680px]:grid-cols-1 lg:grid lg:grid-cols-2 gap-5']) }}>
            {{ $form }}
        </div>
    </div>

    @if (isset($actions))
        <div
            class="flex items-center justify-end px-4 py-3 bg-gray-50 dark:bg-gray-800 text-end sm:px-6 shadow sm:rounded-bl-md sm:rounded-br-md">
            {{ $actions }}
        </div>
    @endif
</form>
