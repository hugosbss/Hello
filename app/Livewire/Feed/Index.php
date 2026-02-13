<?php

namespace App\Livewire\Feed;

use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Index extends Component
{
    public array $posts = [];

    public array $trendingTopics = [];

    public array $onlineFriends = [];

    protected $listeners = [
        'post-created' => 'refreshPosts',
        'feed-updated' => 'refreshPosts',
    ];

    public function mount(): void
    {
        $this->refreshPosts();

        $this->trendingTopics = ['#Laravel12', '#Livewire', '#UIInspiration', '#ProductBuild'];

        $this->onlineFriends = [
            ['name' => 'Daniela', 'status' => 'Editando perfil'],
            ['name' => 'Renato', 'status' => 'Online agora'],
            ['name' => 'Julia', 'status' => 'Publicou ha 3 min'],
            ['name' => 'Marcos', 'status' => 'Comentou no feed'],
        ];
    }

    public function loadPosts(): array
    {
        $dbPosts = Post::with(['user', 'comments.user'])
            ->withCount('likes')
            ->latest()
            ->take(15)
            ->get();

        $currentUserId = Auth::id();

        return $dbPosts->map(function (Post $post) use ($currentUserId) {
            return [
                'id' => 'db-'.$post->id,
                'post_id' => $post->id,
                'author' => $post->user?->name ?? 'Usuario',
                'username' => str($post->user?->email ?? 'usuario')->before('@')->toString(),
                'avatar' => strtoupper(substr($post->user?->name ?? 'U', 0, 2)),
                'time' => optional($post->created_at)?->diffForHumans() ?? 'agora',
                'content' => $post->body,
                'tags' => ['Post'],
                'likes' => (int) $post->likes_count,
                'liked' => $currentUserId ? $post->likes()->where('user_id', $currentUserId)->exists() : false,
                'comments' => $post->comments->map(function ($comment) {
                    return [
                        'author' => $comment->user?->name ?? 'Usuario',
                        'username' => str($comment->user?->email ?? 'usuario')->before('@')->toString(),
                        'text' => $comment->body,
                    ];
                })->values()->toArray(),
            ];
        })->values()->toArray();
    }

    public function refreshPosts(): void
    {
        $this->posts = $this->loadPosts();
    }

    public function render()
    {
        return view('livewire.feed.index');
    }
}
