<section class="rounded-3xl border border-white/10 bg-slate-900/75 p-5 shadow-2xl shadow-cyan-950/20 backdrop-blur-xl">
    <div class="flex items-center gap-3">
        <div class="flex h-11 w-11 items-center justify-center rounded-2xl bg-cyan-500/20 font-semibold text-cyan-300">
            {{ strtoupper(substr(auth()->user()->name, 0, 2)) }}
        </div>
        <div>
            <p class="font-medium text-slate-100">{{ auth()->user()->name }}</p>
            <p class="text-xs text-slate-400">No que voce esta pensando?</p>
        </div>
    </div>

    <form wire:submit="publish" class="mt-4 space-y-4">
        <textarea
            wire:model.live="content"
            rows="4"
            placeholder="Compartilhe uma atualizacao com a comunidade..."
            class="w-full rounded-2xl border border-white/10 bg-slate-800/70 px-4 py-3 text-sm text-slate-100 placeholder:text-slate-400 focus:border-cyan-400 focus:ring-cyan-400"
        ></textarea>

        <div class="flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between">
            <div class="flex items-center gap-3">
                <label class="text-xs text-slate-400">Visibilidade</label>
                <select wire:model.live="audience" class="rounded-xl border border-white/10 bg-slate-800/80 px-3 py-2 text-xs text-slate-100 focus:border-cyan-400 focus:ring-cyan-400">
                    <option value="public">Publico</option>
                    <option value="friends">Amigos</option>
                    <option value="private">Privado</option>
                </select>
            </div>

            <button type="submit" class="inline-flex items-center justify-center rounded-xl bg-cyan-400 px-4 py-2 text-sm font-semibold text-slate-950 transition hover:bg-cyan-300">
                Publicar
            </button>
        </div>
    </form>

    @if ($published)
        <p class="mt-3 text-xs text-emerald-400">Layout de publicacao pronto. Agora e so ligar ao backend do post.</p>
    @endif
</section>
