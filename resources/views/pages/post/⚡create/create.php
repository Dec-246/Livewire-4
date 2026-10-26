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
        sleep(1);
        Post::create($this->validate([
            'title' => 'required|min:3',
            'content' => 'required',
        ]));

        $this->redirect('/');
    }
};
