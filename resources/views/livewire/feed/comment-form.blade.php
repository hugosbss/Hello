<form wire:submit="submit" class="space-y-2">
    <div class="flex items-center gap-2">
        <input
            type="text"
            wire:model.live="comment"
            placeholder="Escreva um comentario..."
            class="w-full rounded-xl border border-white/10 bg-slate-800/70 px-3 py-2 text-sm text-slate-100 placeholder:text-slate-400 focus:border-cyan-400 focus:ring-cyan-400"
        />
        <button type="submit" class="rounded-xl bg-white/10 px-3 py-2 text-xs font-semibold text-slate-200 transition hover:bg-cyan-400 hover:text-slate-950">
            Enviar
        </button>
    </div>

    @if ($sent)
        <p class="text-xs text-emerald-400">Comentario capturado no frontend.</p>
    @endif
</form>
