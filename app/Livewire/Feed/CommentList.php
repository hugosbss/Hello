<?php

namespace App\Livewire\Feed;

use Livewire\Component;

class CommentList extends Component
{
    public array $comments = [];

    public int $previewCount = 2;

    public function getVisibleCommentsProperty(): array
    {
        return array_slice($this->comments, 0, $this->previewCount);
    }

    public function getHasMoreProperty(): bool
    {
        return count($this->comments) > $this->previewCount;
    }

    public function render()
    {
        return view('livewire.feed.comment-list');
    }
}
