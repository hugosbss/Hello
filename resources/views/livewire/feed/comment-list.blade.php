<section class="space-y-3">
    @foreach ($this->visibleComments as $comment)
        <div class="rounded-2xl border border-white/10 bg-slate-800/60 px-3 py-2">
            <p class="text-xs text-slate-400">&#64;{{ $comment['username'] }}</p>
            <p class="text-sm text-slate-200">{{ $comment['text'] }}</p>
        </div>
    @endforeach

    @if ($this->hasMore)
        <button class="text-xs font-medium text-cyan-300 transition hover:text-cyan-200">Ver mais comentarios</button>
    @endif
</section>
