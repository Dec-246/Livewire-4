<?php

use Livewire\Component;
use App\Models\Post;
use Livewire\Attributes\Layout;

new #[Layout('layouts::app', ['title' => 'Create post'])] class extends Component
{
    public $title = '';

    public $content = '';

    public function save()
    {
        Post::create($this->validate([
            'title' => 'required|min:3',
            'content' => 'required',
        ]));

        $this->redirect('/');
    }
};
?>

{{-- ----------------------------- TEXT  -------------------------------- --}}
<form wire:submit="save" class="w-96 space-y-6">
   <label class="block space-y-2">
    <p
        class="inline-flex items-center text-sm font-medium [:.where(&)]:text-zinc-800 [::where(&)]:dark:text-white [&:has([aria-invalid='true'])]:text-red-500">
        Title
    </p>
    <input type="text" wire:model="title"
        class="w-full border rounded-lg block disabled:shadow-none dark:shadow-none appearance-none text-" />
</label>

{{-- ----------------------------- CONTENT  -------------------------------- --}}
<label class="block space-y-2">
    <p
        class="inline-flex items-center text-sm font-medium [:.where(&)]:text-zinc-800 [::where(&)]:dark:text-white [&:has([aria-invalid='true'])]:text-red-500">
        Content
    </p>
    <textarea wire:model="content"
        class="block p-3 w-full shadow-xs disabled:shadow-none border rounded-lg bg-white dark:bg-dark"></textarea>
</label>

{{-- ----------------------------- SAVE  -------------------------------- --}}
<button type="submit"
    class="relative items-center font-medium justify-center gap-2 whitespace-nowrap disabled:opacity-7">
    Save
</button>
    {{-- Nothing worth having comes easy. - Theodore Roosevelt --}}
</form>
