<?php

use Livewire\Component;
use Livewire\Attributes\Title;
use Livewire\Attributes\Computed;
use App\Models\Post;
use App\Enums\StatusEnum;

new #[Title('Posts')] class extends Component
{
    public $selected = [];
    public string $sort = 'newest';

    public ?int $statusFilter = null;

    #[Computed]
    public function posts()
    {
        return Post::query()
            ->when($this->statusFilter !== null, fn ($q) => $q->where('status', $this->statusFilter))
            ->tap(fn ($q) => match ($this->sort) {
                'oldest' => $q->orderBy('created_at', 'asc'),
                'popular' => $q->orderBy('views', 'desc'),
                default => $q->latest(),
            })
            ->get();
    }

    public function deleteSelected() {
        Post::whereIn('id', $this->selected)->delete();

        $this->selected = [];
    }

    public function statuses(): array
    {
        return StatusEnum::cases();
    }

    public function filterByStatus(?int $status): void
    {
        $this->statusFilter = $status;
    }

    public function bgClass(int $status): string
    {
        return match ($status) {
            0 => 'bg-red-100 border-red-300!',
            1 => 'bg-blue-100 border-blue-300!',
            2 => 'bg-green-100 border-green-300!',
            default => 'bg-orange-100',
        };
    }

    public function delete(Post $post)
    {
        $post->delete();
    }
};
