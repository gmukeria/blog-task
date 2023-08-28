<?php

namespace Tests\Unit;

use App\Models\Blog;
use Tests\TestCase;

class BlogTest extends TestCase
{

    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_blog_store()
    {
        $response = $this->call('POST', '/blog', [
            'title' => 'Test Title',
            'desc' => 'Test Description',
            'image_middle' => 'https://www.image.com/photo.jpg',
            'image_large' => 'https://www.image.com/photo.jpg',
            'text' => 'Test Text',
        ]);

        $response->assertStatus($response->status(), 302);
    }

    public function test_blog_update()
    {
        $blog = Blog::factory()->create();
        $newData = [
            'title' => 'Test Title Change',
            'desc' => 'Test Description Change',
            'image_middle' => 'https://www.image.com/photo.jpg',
            'image_large' => 'https://www.image.com/photo.jpg',
            'text' => 'Test Text Change',
        ];

        $response = $this->call('PUT', route('blog.update', ['id' => $blog->id]), $newData);
        $response->assertStatus($response->status(), 302);
    }


    public function test_blog_delete()
    {
        $blog = Blog::factory()->create();
        $response = $this->call('DELETE', route('blog.delete', ['id' => $blog->id]));
        $response->assertStatus($response->status(), 302);
    }

}
