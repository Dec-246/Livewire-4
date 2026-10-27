<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Livewire\Livewire;
use App\Models\Post;
use function Pest\Laravel\assertDatabaseHas;
use function Pest\Laravel\assertDatabaseMissing;

test ('example', function() {
    assertDatabaseMissing(Post::class, [
        'title' => 'Test title',
        'content' => 'Test content',
    ]);

    visit('/post/create')
        //->debug() // can use debug to find errors in a browser test
        ->type('[wire\:model="title"]', 'Test title')
        ->type('[wire\:model="content"]', 'Test content')
        ->press('Save')
        ->assertPathIs('/posts');

        assertDatabaseHas(Post::class, [
        'title' => 'Test title',
        'content' => 'Test content',
    ]);
});
