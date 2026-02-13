<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <script>
            (function () {
                const STORAGE_KEY = 'hello-theme';

                const applyTheme = (theme) => {
                    const isDark = theme === 'dark';
                    document.documentElement.classList.toggle('dark', isDark);
                    document.querySelectorAll('[data-theme-label]').forEach((el) => {
                        el.textContent = isDark ? 'Tema claro' : 'Tema escuro';
                    });
                    document.querySelectorAll('[data-theme-checkbox]').forEach((el) => {
                        el.checked = isDark;
                    });
                };

                const getPreferredTheme = () => {
                    const stored = localStorage.getItem(STORAGE_KEY);

                    if (stored === 'dark' || stored === 'light') {
                        return stored;
                    }

                    return window.matchMedia('(prefers-color-scheme: dark)').matches ? 'dark' : 'light';
                };

                window.setTheme = function (theme) {
                    localStorage.setItem(STORAGE_KEY, theme);
                    applyTheme(theme);
                };

                window.toggleTheme = function () {
                    const nextTheme = document.documentElement.classList.contains('dark') ? 'light' : 'dark';
                    window.setTheme(nextTheme);
                };

                applyTheme(getPreferredTheme());
                document.addEventListener('DOMContentLoaded', () => applyTheme(getPreferredTheme()));
            })();
        </script>

        <title>{{ config('app.name', 'Laravel') }}</title>
        <link rel="icon" type="image/webp" href="/assets/img/hello.webp">

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=manrope:400,500,600,700,800|plus-jakarta-sans:400,500,600,700,800&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <!-- Styles -->
        @livewireStyles
    </head>
    <body class="font-sans antialiased bg-slate-100 dark:bg-slate-950 text-slate-900 dark:text-slate-100">
        <x-banner />

        <div class="min-h-screen bg-slate-100 dark:bg-slate-950">
            @livewire('navigation-menu')

            <!-- Page Heading -->
            @if (isset($header))
                <header class="bg-white dark:bg-slate-900 shadow border-b border-slate-200 dark:border-slate-800">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endif

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
        </div>

        @stack('modals')

        @livewireScripts
    </body>
</html>
