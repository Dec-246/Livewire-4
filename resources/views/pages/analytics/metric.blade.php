@props(['heading', 'number', 'change' => null])

{{-- using $attributes to enable wire:poll.
Anything not declared in @props (here heading, number and change)
goes into the $attributes bag. --}}
<flux:card {{ $attributes->class('flex flex-col gap-2') }}>
    <div class="flex items-center justify-between">
        <flux:subheading>{{ $heading }}</flux:subheading>
        {{ $slot }}
    </div>

    <flux:heading size="xl">{{ $number }}</flux:heading>

    @if (! is_null($change))
        <flux:text size="sm" class="{{ $change >= 0 ? 'text-green-600' : 'text-red-600' }}">
            <flux:icon name="{{ $change >= 0 ? 'arrow-trending-up' : 'arrow-trending-down' }}" class="inline size-3" />
            {{ $change >= 0 ? '+' : '' }}{{ $change }}% vs last period
        </flux:text>
    @endif
</flux:card>
