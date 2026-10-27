<?php

use App\Models\Post;
use Livewire\Attributes\Title;
use Livewire\Component;

new #[Title('Create post')] class extends Component
{
    public string $title = '';

    public string $content = '';

    public int $status = 0;

    public function save()
    {
        Post::create($this->validate([
            'title' => 'required|min:3',
            'content' => 'required',
            'status' => 'required|in:0,1',
        ]));

        $this->redirect('/posts');
    }
};
