<?php

use App\Models\Post;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Lazy;
use Livewire\Attributes\Title;
use Livewire\Component;

// using Lazy attribute - causing small delay to load all contents at same time
new #[Lazy, Title('Posts')] class extends Component
{
    public string $sort = 'newest';

    #[Computed]
    public function posts()
    {
        sleep(1);
        return Post::query()
        ->tap(fn ($q) => match ($this->sort) {
            'oldest' => $q->orderBy('created_at', 'asc'),
            'popular' => $q->orderBy('views', 'desc'),
            default => $q->latest(),
        })
        ->get();
    }

    public function delete(Post $post)
    {
        $post->delete();
    }
};
