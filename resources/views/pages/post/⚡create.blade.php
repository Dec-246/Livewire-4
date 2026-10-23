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

    <flux:input wire:model="title" label="Title" />

    <flux:textarea wire:model="content" label="Content" />



{{-- ----------------------------- SAVE  -------------------------------- --}}
<flux:button type="submit" variant="primary">Save</flux:button>
    {{-- Nothing worth having comes easy. - Theodore Roosevelt --}}
</form>
