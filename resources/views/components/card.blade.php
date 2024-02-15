@props(['title' => '', 'showTitle' => false])
<div
    class="p-6 lg:p-8 bg-white dark:bg-gray-800 dark:bg-gradient-to-bl dark:from-gray-700/50 dark:via-transparent border-b border-gray-200 dark:border-gray-700">
    @if ($showTitle)
        <h1 class="text-2xl font-medium text-gray-900 dark:text-white">
            {{ $title }}
        </h1>
    @endif

    <p class="text-gray-500 dark:text-gray-400 leading-relaxed">
        {{ $slot }}
    </p>
</div>
