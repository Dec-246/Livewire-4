<?php

use Livewire\Component;
use Livewire\Attributes\Title;
use Livewire\Attributes\Computed;
use App\Models\Post;

new #[Title('Posts')] class extends Component
{
    public string $sort = 'newest';

    #[Computed]
    public function posts()
    {
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
