<div>
    <button type="button" wire:click="increment">Increment</button>

    <div>Count: {{ $count }}</div>
</div>

{{-- can use @script in v3 but should use <script> tags in v4 --}}