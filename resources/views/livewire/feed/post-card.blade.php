<article class="rounded-3xl border border-slate-200 dark:border-white/10 bg-white/90 dark:bg-slate-900/80 p-5 shadow-xl shadow-slate-900/10 dark:shadow-slate-950/40 backdrop-blur-xl">
    <div class="flex items-start justify-between gap-3">
        <div class="flex items-center gap-3">
            <div class="flex h-11 w-11 items-center justify-center rounded-2xl bg-fuchsia-500/15 dark:bg-fuchsia-500/20 text-sm font-semibold text-fuchsia-700 dark:text-fuchsia-200">
                {{ $post['avatar'] }}
            </div>
            <div>
                <p class="font-medium text-slate-900 dark:text-slate-100">{{ $post['author'] }}</p>
                <p class="text-xs text-slate-500 dark:text-slate-400">&#64;{{ $post['username'] }} · {{ $post['time'] }}</p>
            </div>
        </div>
        <button class="rounded-lg px-2 py-1 text-slate-500 dark:text-slate-400 transition hover:bg-slate-100 dark:hover:bg-white/5 hover:text-slate-700 dark:hover:text-slate-200">•••</button>
    </div>

    <p class="mt-4 text-sm leading-6 text-slate-700 dark:text-slate-200">{{ $post['content'] }}</p>

    <div class="mt-4 flex flex-wrap gap-2">
        @foreach ($post['tags'] as $tag)
            <span class="rounded-full border border-cyan-500/20 bg-cyan-500/10 px-3 py-1 text-xs text-cyan-700 dark:text-cyan-200">{{ $tag }}</span>
        @endforeach
    </div>

    <div class="mt-5 flex items-center justify-between border-y border-slate-200 dark:border-white/10 py-3">
        <livewire:feed.like-button :post-id="$post['post_id']" :likes="$post['likes']" :liked="$post['liked']" :key="'like-'.$post['id']" />
        <p class="text-xs text-slate-500 dark:text-slate-400">{{ count($post['comments']) }} comentarios</p>
    </div>

    <div class="mt-4 space-y-4">
        <livewire:feed.comment-list :comments="$post['comments']" :key="'comments-'.$post['id']" />
        <livewire:feed.comment-form :post-id="$post['post_id']" :key="'comment-form-'.$post['id']" />
    </div>
</article>
