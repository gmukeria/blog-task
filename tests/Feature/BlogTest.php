<?php

use App\Models\User;
use App\Models\Blog;
use Spatie\Permission\Models\Role;

test('blog post can be created', function () {
    Role::create(['name' => 'editor', 'guard_name' => 'web']);

    $user = User::factory()->create();
    $user->assignRole('editor');
    $this->actingAs($user);

    $blogData = [
        'title' => 'Test Title ',
        'desc' => 'Test Description ',
        'image_middle' => 'https://www.image.com/photo.jpg',
        'image_large' => 'https://www.image.com/photo.jpg',
        'text' => 'Test Text '
    ];

    $this->actingAs($user)
        ->followingRedirects()->post('/blog', $blogData)->assertStatus(200);
});

test('blog post can be updated', function () {
    Role::create(['name' => 'editor', 'guard_name' => 'web']);

    $user = User::factory()->create();
    $user->assignRole('editor');

    $blogData = [
        'title' => 'Test Title new',
        'desc' => 'Test Description new',
        'image_middle' => 'https://www.image.com/photo.jpg',
        'image_large' => 'https://www.image.com/photo.jpg',
        'text' => 'Test Text new',
    ];

    $this->actingAs($user)->followingRedirects()->post('/blog', $blogData)->assertStatus(200);

    $blog = Blog::where($blogData)->first();
    $this->assertNotNull($blog);

    $updatedTitle = 'Updated Test Blog';
    $updatedDesc = 'This is the updated Desc.';

    $response = $this
        ->actingAs($user)
        ->put('/blog/'.$blog->id, [
            'title' => $updatedTitle,
            'desc' => $updatedDesc,
            'image_middle' => 'https://www.image.com/photo.jpg',
            'image_large' => 'https://www.image.com/photo.jpg',
            'text' => 'Test Text new',
        ]);

    $response
        ->assertSessionHasNoErrors()
        ->assertStatus(302)
        ->assertRedirect('/blog/edit/'.$blog->id);

    $blog->refresh();
    $this->assertSame($updatedTitle, $blog->title);
    $this->assertSame($updatedDesc, $blog->desc);
});



test('blog post can be deleted', function () {

    Role::create(['name' => 'editor', 'guard_name' => 'web']);

    $user = User::factory()->create();
    $user->assignRole('editor');

    $blogData = [
        'title' => 'Test Title ',
        'desc' => 'Test Description ',
        'image_middle' => 'https://www.image.com/photo.jpg',
        'image_large' => 'https://www.image.com/photo.jpg',
        'text' => 'Test Text '
    ];

    $this->actingAs($user)
        ->followingRedirects()->post('/blog', $blogData)->assertStatus(200);

    $blog = Blog::where($blogData)->first();

    $response = $this
        ->actingAs($user)
        ->delete('/blog/'.$blog->id, []);

    $response
        ->assertSessionHasNoErrors()
        ->assertStatus(302)
        ->assertRedirect('/');

    $this->assertNull($blog->fresh());
});
