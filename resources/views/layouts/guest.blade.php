<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="icon" type="image/webp" href="{{ asset('storage/assets/img/hello.webp') }}">
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
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <!-- Styles -->
        @livewireStyles
    </head>
    <body class="min-h-screen bg-slate-100 dark:bg-slate-950 text-slate-900 dark:text-slate-100">
        <div class="font-sans antialiased">
            <header class="mx-auto flex w-full max-w-6xl items-center justify-between px-6 py-6">
                <a href="/" class="flex items-center gap-3">
                    <div class="h-9 w-9 rounded-xl bg-gradient-to-br from-sky-500 to-blue-600">
                        <img src="/assets/img/hello.webp" alt="Hello logo">
                    </div>
                    <div>
                        <p class="font-display text-lg font-bold leading-none">Hello</p>
                        <p class="text-xs text-slate-600 dark:text-slate-400">rede social</p>
                    </div>
                </a>

                <div class="flex items-center gap-2">
                    <label class="switch">
                        <input class="switch__input" data-theme-checkbox type="checkbox" role="switch" onchange="window.setTheme(this.checked ? 'dark' : 'light')" />
                        <span class="switch__icon">
                            <span class="switch__icon-part switch__icon-part--1"></span>
                            <span class="switch__icon-part switch__icon-part--2"></span>
                            <span class="switch__icon-part switch__icon-part--3"></span>
                            <span class="switch__icon-part switch__icon-part--4"></span>
                            <span class="switch__icon-part switch__icon-part--5"></span>
                            <span class="switch__icon-part switch__icon-part--6"></span>
                            <span class="switch__icon-part switch__icon-part--7"></span>
                            <span class="switch__icon-part switch__icon-part--8"></span>
                            <span class="switch__icon-part switch__icon-part--9"></span>
                            <span class="switch__icon-part switch__icon-part--10"></span>
                            <span class="switch__icon-part switch__icon-part--11"></span>
                        </span>
                        <span class="switch__sr" data-theme-label>Tema escuro</span>
                    </label>
                    @if (Route::has('login') && !request()->routeIs('login'))
                        <a href="{{ route('login') }}" class="rounded-full border border-slate-300 dark:border-slate-700 px-4 py-2 text-xs font-semibold hover:bg-slate-100 dark:hover:bg-slate-800">Entrar</a>
                    @endif
                    @if (Route::has('register') && !request()->routeIs('register'))
                        <a href="{{ route('register') }}" class="rounded-full bg-sky-500 px-4 py-2 text-xs font-semibold text-white hover:bg-sky-600">Criar conta</a>
                    @endif
                </div>
            </header>

            {{ $slot }}
        </div>

        @livewireScripts
    </body>
</html>
