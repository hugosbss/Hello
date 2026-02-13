<?php

namespace App\Livewire\Feed;

use App\Models\Post;
use Livewire\Component;

class CreatePost extends Component
{
    public string $content = '';

    public string $audience = 'public';

    public bool $published = false;

    public function publish(): void
    {
        $this->validate([
            'content' => ['required', 'string', 'min:3'],
        ]);

        Post::create([
            'user_id' => auth()->id(),
            'title' => 'Publicacao no feed',
            'body' => $this->content,
        ]);

        $this->dispatch('post-created')->to(Index::class);
        $this->reset('content');
        $this->published = true;
    }

    public function render()
    {
        return view('livewire.feed.create-post');
    }
}
