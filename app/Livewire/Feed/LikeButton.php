<?php

namespace App\Livewire\Feed;

use App\Models\Like;
use Livewire\Component;

class LikeButton extends Component
{
    public ?int $postId = null;

    public int $likes = 0;

    public bool $liked = false;

    public function mount(?int $postId = null, int $likes = 0, bool $liked = false): void
    {
        $this->postId = $postId;
        $this->likes = $likes;
        $this->liked = $liked;
    }

    public function toggle(): void
    {
        if (!$this->postId || !auth()->check()) {
            return;
        }

        $userId = auth()->id();
        $like = Like::where('post_id', $this->postId)->where('user_id', $userId)->first();

        if ($like) {
            $like->delete();
            $this->liked = false;
            $this->likes = max(0, $this->likes - 1);
        } else {
            Like::create([
                'post_id' => $this->postId,
                'user_id' => $userId,
            ]);
            $this->liked = true;
            $this->likes++;
        }

        $this->dispatch('feed-updated')->to(Index::class);
    }

    public function render()
    {
        return view('livewire.feed.like-button');
    }
}
