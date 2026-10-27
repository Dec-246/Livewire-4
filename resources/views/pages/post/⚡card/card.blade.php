@placeholder
<flux:skeleton animate="shimmer" class="min-h-56 rounded-lg" />
@endplaceholder

<flux:card {{ $attributes->class('flex flex-col gap-3') }}>
    <div>
        <div class="flex items-start justify-between">
            <flux:heading size="lg">{{ $post->title }}</flux:heading>
            {{ $slots['checkbox'] }}
        </div>

        <flux:text class="mt-1 text-xs text-zinc-500">{{ $post->created_at->diffForHumans() }}</flux:text>
        <flux:text class="mt-4 line-clamp-3">{{ $post->content }}</flux:text>
    </div>

    <div class="mt-6 flex justify-between">
        <div class="flex items-center">
            {{-- @if ($post->status === 'published')
                <flux:badge rounded size="sm" variant="solid">Published</flux:badge>
            @else
                <flux:badge rounded size="sm">Draft</flux:badge>
            @endif --}}



            <flux:badge size="sm" class="{{ $post->status->badgeClass() }}">
                <flux:icon name="{{ $post->status->icon() }}" class="size-3" variant="solid" />
                    {{ $post->status->label() }}
                </flux:badge>
        </div>




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
    </div>
    </flux:card>
