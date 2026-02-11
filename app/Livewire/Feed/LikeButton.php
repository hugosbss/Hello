<?php

namespace App\Livewire\Feed;

use Livewire\Component;

class LikeButton extends Component
{
    public int $likes = 0;

    public bool $liked = false;

    public function mount(int $likes = 0, bool $liked = false): void
    {
        $this->likes = $likes;
        $this->liked = $liked;
    }

    public function toggle(): void
    {
        $this->liked = ! $this->liked;
        $this->likes += $this->liked ? 1 : -1;
    }

    public function render()
    {
        return view('livewire.feed.like-button');
    }
}
