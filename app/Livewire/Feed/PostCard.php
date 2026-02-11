<?php

namespace App\Livewire\Feed;

use Livewire\Component;

class PostCard extends Component
{
    public array $post = [];

    public function render()
    {
        return view('livewire.feed.post-card');
    }
}
