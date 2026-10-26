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

    Livewire::test('pages::post.create')
        ->set('title', 'Test title')
        ->set('content', 'Test content')
        ->call('save')
        ->assertRedirect('/');

        assertDatabaseHas(Post::class, [
        'title' => 'Test title',
        'content' => 'Test content',
    ]);
});
