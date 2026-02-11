<?php

namespace App\Livewire\Feed;

use Livewire\Component;

class CreatePost extends Component
{
    public string $content = '';

    public string $audience = 'public';

    public bool $published = false;

    public function publish(): void
    {
        $this->reset('content');
        $this->published = true;
    }

    public function render()
    {
        return view('livewire.feed.create-post');
    }
}
