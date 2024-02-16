@php
    $active = 'bg-indigo-400 rounded text-white';
    $menu = [
        [
            'route' => 'dosen-index',
            'title' => 'Dosen',
            'icon' => 'fa-user',
        ],
        [
            'route' => 'gedung-index',
            'title' => 'Gedung',
            'icon' => 'fa-building-user',
        ],
        [
            'route' => 'ruangan-index',
            'title' => 'Ruangan',
            'icon' => 'fa-people-roof',
        ],
        [
            'route' => 'jurusan-index',
            'title' => 'Jurusan(Program Studi)',
            'icon' => 'fa-laptop-code',
        ],
        [
            'route' => 'kelas-index',
            'title' => 'Kelas',
            'icon' => 'fa-chalkboard-user',
        ],
    ];
@endphp
<div
    class="p-6 lg:p-8 bg-white dark:bg-gray-800 dark:bg-gradient-to-bl dark:from-gray-700/50 dark:via-transparent border-b border-gray-200 dark:border-gray-700 dark:text-white">
    <div class="flex gap-4">
        @foreach ($menu as $item)
            <a href="{{ route($item['route']) }}"
                class="flex hover:text-white border border-indigo-400 rounded gap-3 duration-300 items-center align-center p-2 hover:bg-indigo-400 {{ request()->routeIs($item['route']) ? $active : '' }}">
                <i class="fa-solid {{ $item['icon'] }}"></i>
                <span>{{ $item['title'] }}</span>
            </a>
        @endforeach
    </div>
</div>
