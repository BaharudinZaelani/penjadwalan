@php
    $hari = ['senin', 'selasa', 'rabu', 'kamis', "jum'at", 'sabut'];
@endphp
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('JadwalKuliah / Preview') }}
        </h2>
    </x-slot>
    <div class="py-5">
        <div class="max-w-7xl mb-3 mx-auto sm:px-6 lg:px-8">
            @foreach ($jadwal as $key => $row)
                <x-card
                    title="{{ $row['semester']['nama'] . '/' . $row['semester']['tahun'] . '/' . $row['semester']['bilangan'] }}"
                    class="mb-3" show-title="true">
                    {{-- fitness --}}
                    <table class="w-[max-content] text-left">
                        <tr>
                            <th>Bentrok</th>
                            <td>: {{ $row['bentrok'] }} Jadwal</td>
                        </tr>
                        <tr>
                            <th>Fitness</th>
                            <td>: {{ $row['fitness'] }}</td>
                        </tr>
                    </table>

                    {{-- Jadwal --}}
                    <div class="grid grid-cols-3 gap-4">
                        @foreach ($hari as $h)
                            <div class="p-2 rounded shadow bg-white">
                                <h2 class="capitalize border-b">{{ $h }}</h2>
                                @foreach ($waktu as $waktu_key => $w)
                                    <div class="border-b flex">
                                        <div class="flex p-2 w-full">
                                            <div class="whitespace-nowrap w-[130px]">
                                                {{ $w->waktu_mulai }} - {{ $w->waktu_selesai }}
                                            </div>
                                            <div class="w-[70%]">
                                                @foreach ($row as $rKey => $jdwl)
                                                    @if (is_int($rKey) && $jdwl['hari'] == $h && $jdwl['waktu_id'] == $w->id)
                                                        <div class="w-[max-content] grid my-1">
                                                            <div
                                                                class="rounded w-[210px] overflow-hidden w-full cursor-pointer bg-indigo-400 p-2 text-white overflow-none hover:h-[max-content] h-[34px] duration-300">
                                                                <div>
                                                                    {{ $jdwl['matkul']['nama_id'] }}
                                                                </div>
                                                                <div
                                                                    class="text-[0.6rem] p-1 rounded shadwo bg-white inline text-indigo-600">
                                                                    {{ $jdwl['ruangan']['nama'] }}
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @endif
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        @endforeach
                    </div>

                </x-card>
            @endforeach
        </div>
    </div>
</x-app-layout>

{{-- @foreach ($jadwal as $smt => $row)
    <x-card title="Jadwal Kuliah" class="rounded mb-3">
        <h1 class="text-[1.4rem] font-bold border-b sticky top-0 bg-white uppercase px-2 shadow">
            {{ $row['semester']['nama'] . '/' . $row['semester']['tahun'] . '/' . $row['semester']['bilangan'] }}
        </h1>
        <table class="w-[max-content] text-left">
            <tr>
                <th>Bentrok</th>
                <td>: {{ $row['bentrok'] }} Jadwal</td>
            </tr>
            <tr>
                <th>Fitness</th>
                <td>: {{ $row['fitness'] }}</td>
            </tr>
        </table>
        <div class="grid grid-cols-3 gap-3">
            @foreach ($hari as $h)
                <div class="p-2 rounded shadow bg-whtie">
                    <h2 class="capitalize border-b">{{ $h }}</h2>
                    <div>

                        @foreach ($waktu as $w)
                            <div class="border-b flex h-[30vh]">
                                <div class="grid p-2 w-[40%]">
                                    <div class="whitespace-nowrap">
                                        {{ $w->waktu_mulai }} - {{ $w->waktu_selesai }}
                                    </div>
                                </div>
                                <div class="flex-auto">
                                    @foreach ($row as $rowKey => $jdwl)
                                        @if (is_array($jdwl) && $jdwl['waktu_id'] == $w->id && $jdwl['semester_id'] == $smt - 1 && $rowKey !== 'semester')
                                            <div class="w-[200px] grid my-1">
                                                <div
                                                    class="rounded cursor-pointer bg-indigo-400 p-2 text-white overflow-none hover:h-[100px] h-[34px] duration-300">
                                                    Ruangan
                                                    <br>
                                                    Matakuliah
                                                </div>
                                            </div>
                                        @endif
                                    @endforeach

                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endforeach
        </div>
    </x-card>
@endforeach --}}
