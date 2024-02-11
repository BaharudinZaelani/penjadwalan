@php
    $menu = [
        [
            'link' => 'dashboard/dosen',
            'title' => 'Dosen',
            'icon' => 'fa-user',
        ],
        [
            'link' => '#',
            'title' => 'Gedung',
            'icon' => 'fa-building-user',
        ],
    ];
@endphp
<div
    class="p-6 lg:p-8 bg-white dark:bg-gray-800 dark:bg-gradient-to-bl dark:from-gray-700/50 dark:via-transparent border-b border-gray-200 dark:border-gray-700 dark:text-white">
    <div class="flex gap-2">
        @foreach ($menu as $item)
            <a href="{{ $item['link'] }}"
                class="flex gap-3 duration-300 items-center align-center p-2 hover:rounded hover:bg-indigo-400">
                <i class="fa-solid {{ $item['icon'] }}"></i>
                <span>{{ $item['title'] }}</span>
            </a>
        @endforeach
    </div>
</div>
