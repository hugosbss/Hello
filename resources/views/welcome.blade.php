<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script>
        (function () {
            const STORAGE_KEY = 'hello-theme';

            const applyTheme = (theme) => {
                const isDark = theme === 'dark';
                document.documentElement.classList.toggle('dark', isDark);
                document.querySelectorAll('[data-theme-label]').forEach((el) => {
                    el.textContent = isDark ? 'Tema claro' : 'Tema escuro';
                });
            };

            const getPreferredTheme = () => {
                const stored = localStorage.getItem(STORAGE_KEY);

                if (stored === 'dark' || stored === 'light') {
                    return stored;
                }

                return window.matchMedia('(prefers-color-scheme: dark)').matches ? 'dark' : 'light';
            };

            window.toggleTheme = function () {
                const nextTheme = document.documentElement.classList.contains('dark') ? 'light' : 'dark';
                localStorage.setItem(STORAGE_KEY, nextTheme);
                applyTheme(nextTheme);
            };

            applyTheme(getPreferredTheme());
        })();
    </script>

    <title>{{ config('app.name', 'Hello') }}</title>
    <link rel="icon" type="image/webp" href="/assets/img/hello.webp">

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=manrope:400,500,600,700,800|plus-jakarta-sans:500,700,800&display=swap" rel="stylesheet" />
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="min-h-screen bg-slate-100 text-slate-900 dark:bg-slate-950 dark:text-slate-100">
<div class="relative overflow-hidden">
    <div class="absolute inset-0 bg-[radial-gradient(circle_at_15%_15%,rgba(14,165,233,0.35),transparent_45%),radial-gradient(circle_at_85%_20%,rgba(59,130,246,0.25),transparent_50%),radial-gradient(circle_at_50%_85%,rgba(56,189,248,0.22),transparent_50%)]"></div>

    <header class="relative z-10 mx-auto flex w-full max-w-7xl items-center justify-between px-6 py-6">
        <a href="/" class="flex items-center gap-3">
            <div class="h-10 w-10 rounded-xl">
                <img src="/assets/img/hello.webp" alt="Hello logo">
            </div>
            <div>
                <p class="font-display text-xl font-extrabold tracking-tight">Hello</p>
                <p class="text-xs text-slate-600 dark:text-slate-400">Rede social</p>
            </div>
        </a>

        @if (Route::has('login'))
            <nav class="flex items-center gap-3">
                <button
                    type="button"
                    onclick="window.toggleTheme()"
                    class="rounded-full border border-slate-300 dark:border-slate-700 px-4 py-2 text-sm font-semibold hover:bg-slate-200/70 dark:hover:bg-slate-800/70"
                >
                    <span data-theme-label>Tema escuro</span>
                </button>
                @auth
                    <a href="{{ url('/dashboard') }}" class="rounded-full border border-slate-300 dark:border-slate-700 px-4 py-2 text-sm font-semibold hover:bg-slate-200/70 dark:hover:bg-slate-800/70">Dashboard</a>
                @else
                    <a href="{{ route('login') }}" class="rounded-full border border-slate-300 dark:border-slate-700 px-4 py-2 text-sm font-semibold hover:bg-slate-200/70 dark:hover:bg-slate-800/70">Entrar</a>
                    @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="rounded-full bg-sky-500 px-4 py-2 text-sm font-semibold text-white hover:bg-sky-600">Criar conta</a>
                    @endif
                @endauth
            </nav>
        @endif
    </header>

    <main class="relative z-10 mx-auto grid w-full max-w-7xl gap-8 px-6 pb-14 pt-4 lg:grid-cols-2 lg:items-center lg:pb-24 lg:pt-8">
        <section>
            <p class="mb-4 inline-flex rounded-full border border-sky-200 bg-sky-100 px-3 py-1 text-xs font-bold uppercase tracking-wide text-sky-700 dark:border-sky-900/60 dark:bg-sky-950/40 dark:text-sky-300">Hello Social Platform</p>
            <h1 class="font-display text-4xl font-extrabold leading-tight sm:text-5xl">
                Conecte pessoas, ideias e comunidades no <span class="text-sky-500">Hello</span>.
            </h1>
            <p class="mt-5 max-w-xl text-base leading-relaxed text-slate-600 dark:text-slate-300">
                Publique atualizações, interaja com amigos, crie grupos e acompanhe o feed em tempo real em uma experiência simples e intuitiva.
            </p>

            <div class="mt-8 flex flex-wrap gap-3">
                @if (Route::has('register'))
                    <a href="{{ route('register') }}" class="rounded-xl bg-sky-500 px-5 py-3 text-sm font-semibold text-white shadow-lg shadow-sky-500/30 hover:bg-sky-600">Começar agora</a>
                @endif
                @if (Route::has('login'))
                    <a href="{{ route('login') }}" class="rounded-xl border border-slate-300 dark:border-slate-700 px-5 py-3 text-sm font-semibold hover:bg-slate-200/70 dark:hover:bg-slate-800/70">Já tenho conta</a>
                @endif
            </div>
        </section>

        <section class="grid gap-4 sm:grid-cols-2">
            <article class="rounded-2xl border border-slate-200/80 dark:border-slate-800 bg-white/90 dark:bg-slate-900/80 p-5 shadow-xl shadow-slate-900/5">
                <p class="text-xs font-bold uppercase tracking-wide text-sky-500">Feed</p>
                <h2 class="mt-2 text-lg font-bold">Timeline inteligente</h2>
                <p class="mt-2 text-sm text-slate-600 dark:text-slate-300">Posts, curtidas e comentarios em um feed dinamico.</p>
            </article>

            <article class="rounded-2xl border border-slate-200/80 dark:border-slate-800 bg-white/90 dark:bg-slate-900/80 p-5 shadow-xl shadow-slate-900/5">
                <p class="text-xs font-bold uppercase tracking-wide text-sky-500">Grupos</p>
                <h2 class="mt-2 text-lg font-bold">Comunidades</h2>
                <p class="mt-2 text-sm text-slate-600 dark:text-slate-300">Crie ou participe de grupos por interesse.</p>
            </article>

            <article class="rounded-2xl border border-slate-200/80 dark:border-slate-800 bg-white/90 dark:bg-slate-900/80 p-5 shadow-xl shadow-slate-900/5 sm:col-span-2">
                <p class="text-xs font-bold uppercase tracking-wide text-sky-500">Perfil</p>
                <h2 class="mt-2 text-lg font-bold">Sua identidade no app</h2>
                <p class="mt-2 text-sm text-slate-600 dark:text-slate-300">Personalize seu perfil, publique conteudo e fortaleça sua rede.</p>
            </article>
        </section>
    </main>
</div>
</body>
</html>
