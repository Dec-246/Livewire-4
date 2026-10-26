<flux:card class="flex flex-col gap-3">
    <div class="flex items-center justify-between gap-2">
        <flux:badge size="sm" :color="$post->status === 'published' ? 'green' : 'zinc'">
            {{ ucfirst($post->status) }}
        </flux:badge>

        <flux:text size="sm" class="text-zinc-500">{{ $post->created_at->diffForHumans() }}</flux:text>
    </div>

    <flux:heading size="lg">{{ $post->title }}</flux:heading>

    <flux:text class="line-clamp-3">{{ $post->content }}</flux:text>

    <div class="flex justify-end mt-2">
        <flux:button
            size="sm"
            variant="danger"
            icon="trash"
            wire:click="$parent.delete({{ $post->id }})"
            wire:confirm="Delete this post?"
        >
            Delete
        </flux:button>
    </div>
</flux:card>
