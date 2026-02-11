<button wire:click="toggle" class="group inline-flex items-center gap-2 rounded-xl px-3 py-2 transition hover:bg-white/5">
    <span class="{{ $liked ? 'text-rose-400' : 'text-slate-300' }} transition group-hover:text-rose-400">♥</span>
    <span class="{{ $liked ? 'text-rose-300' : 'text-slate-300' }} text-sm font-medium">{{ $likes }}</span>
</button>
