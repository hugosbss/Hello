<?php

namespace App\Livewire\Feed;

use App\Models\Comment;
use App\Models\Post;
use Livewire\Component;

class CommentForm extends Component
{
    public ?int $postId = null;

    public string $comment = '';

    public bool $sent = false;

    public function mount(?int $postId = null): void
    {
        $this->postId = $postId;
    }

    public function submit(): void
    {
        if (!$this->postId || !auth()->check()) {
            return;
        }

        $validated = $this->validate([
            'comment' => ['required', 'string', 'min:2', 'max:500'],
        ]);

        $post = Post::find($this->postId);

        if (!$post) {
            return;
        }

        $post->comments()->save(new Comment([
            'user_id' => auth()->id(),
            'body' => $validated['comment'],
        ]));

        $this->reset('comment');
        $this->sent = true;
        $this->dispatch('feed-updated')->to(Index::class);
    }

    public function render()
    {
        return view('livewire.feed.comment-form');
    }
}
