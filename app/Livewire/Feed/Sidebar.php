<?php

namespace App\Livewire\Feed;

use Livewire\Component;

class Sidebar extends Component
{
    public array $trendingTopics = [];

    public array $onlineFriends = [];

    public function render()
    {
        return view('livewire.feed.sidebar');
    }
}
