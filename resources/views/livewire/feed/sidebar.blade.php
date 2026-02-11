<div class="space-y-4">
    <section class="rounded-3xl border border-white/10 bg-slate-900/80 p-5 backdrop-blur-xl">
        <p class="font-display text-lg font-semibold text-slate-100">Trending agora</p>
        <ul class="mt-3 space-y-2">
            @foreach ($trendingTopics as $topic)
                <li class="rounded-xl bg-white/5 px-3 py-2 text-sm text-slate-200 transition hover:bg-white/10">{{ $topic }}</li>
            @endforeach
        </ul>
    </section>

    <section class="rounded-3xl border border-white/10 bg-slate-900/80 p-5 backdrop-blur-xl">
        <p class="font-display text-lg font-semibold text-slate-100">Conexoes online</p>
        <ul class="mt-3 space-y-3">
            @foreach ($onlineFriends as $friend)
                <li class="flex items-center justify-between gap-3">
                    <div>
                        <p class="text-sm font-medium text-slate-100">{{ $friend['name'] }}</p>
                        <p class="text-xs text-slate-400">{{ $friend['status'] }}</p>
                    </div>
                    <span class="h-2.5 w-2.5 rounded-full bg-emerald-400"></span>
                </li>
            @endforeach
        </ul>
    </section>
</div>
