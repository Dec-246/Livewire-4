{{-- ----------------------------- TEXT  -------------------------------- --}}
<form wire:submit="save" class="w-96 space-y-6">

    <flux:input wire:model="title" label="Title" placeholder="Your post title" />

    <flux:textarea wire:model="content" label="Content" placeholder="Write your post content" />

    <flux:radio.group wire:model="status" label="status" variant="cards" class="max-sm:flex-col">
        <flux:radio value="0" label="Draft" description="Post will be saved as draft" checked/>
        <flux:radio value="1" label="Published" description="Post will be published immediately" />
    </flux:radio.group>


{{-- ----------------------------- SAVE  -------------------------------- --}}
{{-- <flux:button type="submit" variant="primary">Save</flux:button> --}}

    <div class="flex justify-end has-data-loading:bg-black:fg-white">
        <button type="submit" class="data-loading:opacity-50 items-center font-medium justify-center gap-2 whitespace-nowrap justify-center h-10 text-sm rounded-lg ps-4 pe-4 inline-flex" variant="primary">
            Create post

            <flux:icon.loading variant="micro" class="not-in-data-loading:hidden" />
        </button>
    </div>
</form>
