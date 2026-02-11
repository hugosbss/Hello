<section class="relative min-h-screen overflow-hidden bg-slate-950">
    <div class="pointer-events-none absolute inset-0">
        <div class="absolute -left-28 top-10 h-72 w-72 rounded-full bg-cyan-500/20 blur-3xl"></div>
        <div class="absolute right-0 top-56 h-72 w-72 rounded-full bg-fuchsia-500/20 blur-3xl"></div>
        <div class="absolute bottom-0 left-1/3 h-80 w-80 rounded-full bg-emerald-500/10 blur-3xl"></div>
    </div>

    <div class="relative mx-auto flex w-full max-w-7xl gap-6 px-4 py-8 sm:px-6 lg:px-8">
        <div class="w-full space-y-6 lg:w-[calc(100%-22rem)]">
            <header class="rounded-3xl border border-white/10 bg-white/5 p-6 text-slate-100 backdrop-blur-xl">
                <p class="font-display text-2xl font-bold tracking-tight sm:text-3xl">Feed do Hello</p>
                <p class="mt-2 text-sm text-slate-300">Comunidade, criacao e colaboracao em um unico fluxo.</p>
            </header>

            <livewire:feed.create-post />

            <div class="space-y-4">
                @foreach ($posts as $post)
                    <livewire:feed.post-card :post="$post" :key="'post-'.$post['id']" />
                @endforeach
            </div>
        </div>

        <aside class="sticky top-20 hidden h-fit w-80 lg:block">
            <livewire:feed.sidebar :trending-topics="$trendingTopics" :online-friends="$onlineFriends" />
        </aside>
    </div>
</section>
