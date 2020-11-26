<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Post;

class PostTest extends TestCase
{
    use RefreshDatabase, DatabaseMigrations;

    /**
     * @test
     */
    public function test_it_returns_a_index_page_for_posts()
    {
        $this->get('/posts')->assertOk();
    }

    /**
     * @test
     */
    public function test_it_returns_a_index_page_for_posts_containing_posts()
    {
        $posts = Post::factory(5)->create();

        $this->get('/posts')->assertOk()
            ->assertViewIs('blog.index')
            ->assertViewHas('posts');
    }

    /**
     * @test
     */
    public function test_it_returns_a_show_page_for_post_containing_post_data()
    {
        $post = Post::factory()->create();

        $this->get("/posts/{$post->id}")->assertOk()
            ->assertViewIs('blog.show')
            ->assertViewHas('post');
    }

    /**
     * @test
     */
    public function test_it_is_able_to_create_a_new_post_from_a_post_request()
    {
        $this->post('/posts', $this->postData())->assertStatus(302)
            ->assertSessionHas('message', 'Post has been created.');

        $this->assertDatabaseHas('posts', [
            'id' => 1,
            'title' => 'A new post has been created.',
            'description' => 'This new post is being driven by tests.',
            'status' => true
        ]);
    }

    /**
     * @test
     */
    public function test_it_returns_validation_error_for_title_stating_required()
    {
        $this->post('/posts', array_merge($this->postData(), ['title' => '']))
            ->assertSessionHasErrors(['title' => 'The title field is required.']);

        $this->assertDatabaseMissing('posts', [
            'id' => 1,
            'title' => '',
        ]);
    }

//    /**
//     * @test
//     */
//    public function test_it_returns_validation_error_for_title_stating_string()
//    {
//        $this->post('/posts', array_merge($this->postData(), ['title' => '123']))
//            ->assertSessionHasErrors(['title' => '']);
//
//        $this->assertDatabaseMissing('posts', [
//            'id' => 1,
//            'title' => '',
//        ]);
//    }

    private function postData()
    {
        return [
            'title' => 'A new post has been created.',
            'description' => 'This new post is being driven by tests.',
            'status' => true
        ];
    }
}
