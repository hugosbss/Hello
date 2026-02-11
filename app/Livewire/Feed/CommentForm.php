<?php

namespace App\Livewire\Feed;

use Livewire\Component;

class CommentForm extends Component
{
    public string $comment = '';

    public bool $sent = false;

    public function submit(): void
    {
        $this->reset('comment');
        $this->sent = true;
    }

    public function render()
    {
        return view('livewire.feed.comment-form');
    }
}
