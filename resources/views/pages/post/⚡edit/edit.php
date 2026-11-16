<?php

use App\Models\Post;
use Livewire\Attributes\Title;
use Livewire\Component;

new #[Title('Edit post')] class extends Component
{
    public Post $post;

    public string $title = '';

    public string $content = '';

    public int $status = 0;

    public function mount(Post $post)
    {
        $this->post = $post;
        $this->title = $post->title;
        $this->content = $post->content;
        $this->status = $post->status->value;
    }

    public function save()
    {
        $this->post->update($this->validate([
            'title' => 'required|min:3',
            'content' => 'required',
            'status' => 'required|in:0,1',
        ]));

        $this->redirect('/posts');
    }
};
