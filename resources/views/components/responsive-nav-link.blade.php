@props(['active'])

@php
$classes = ($active ?? false)
            ? 'block w-full ps-3 pe-4 py-2 border-l-4 border-indigo-400 dark:border-sky-400 text-start text-base font-medium text-indigo-700 dark:text-sky-300 bg-indigo-50 dark:bg-slate-900/80 focus:outline-none focus:text-indigo-800 dark:focus:text-sky-200 focus:bg-indigo-100 dark:focus:bg-slate-900 focus:border-indigo-700 dark:focus:border-sky-500 transition duration-150 ease-in-out'
            : 'block w-full ps-3 pe-4 py-2 border-l-4 border-transparent text-start text-base font-medium text-gray-600 dark:text-slate-400 hover:text-gray-800 dark:hover:text-slate-200 hover:bg-gray-50 dark:hover:bg-slate-900/60 hover:border-gray-300 dark:hover:border-slate-700 focus:outline-none focus:text-gray-800 dark:focus:text-slate-200 focus:bg-gray-50 dark:focus:bg-slate-900/60 focus:border-gray-300 dark:focus:border-slate-700 transition duration-150 ease-in-out';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
