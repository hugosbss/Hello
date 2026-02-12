<div class="min-h-[calc(100vh-88px)] flex flex-col sm:justify-center items-center px-4 pb-10">
    <div class="mb-5">
        {{ $logo }}
    </div>

    <div class="w-full sm:max-w-md px-6 py-6 bg-white/95 dark:bg-slate-900/90 border border-slate-200 dark:border-slate-800 shadow-xl overflow-hidden sm:rounded-2xl">
        {{ $slot }}
    </div>
</div>
