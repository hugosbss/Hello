<button wire:click="toggle" class="group inline-flex items-center gap-2 rounded-xl px-3 py-2 transition hover:bg-slate-100 dark:hover:bg-white/5">
    <span class="{{ $liked ? 'text-rose-500' : 'text-slate-500 dark:text-slate-300' }} transition group-hover:text-rose-400">♥</span>
    <span class="{{ $liked ? 'text-rose-500 dark:text-rose-300' : 'text-slate-600 dark:text-slate-300' }} text-sm font-medium">{{ $likes }}</span>
</button>
