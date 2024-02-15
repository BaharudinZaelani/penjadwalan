@props(['value' => '', 'name' => '', 'type' => 'checkbox'])
<input type="{{ $type }}" name="{{ $name }}" value="{{ $value }}" {!! $attributes->merge([
    'class' =>
        'rounded dark:bg-gray-900 border-gray-300 dark:border-gray-700 text-indigo-600 shadow-sm focus:ring-indigo-500 dark:focus:ring-indigo-600 dark:focus:ring-offset-gray-800',
]) !!}>
