<?php

namespace Tests\Unit;

use App\Models\Admin\Post;
use App\Models\User;
use Carbon\Carbon;
use Tests\TestCase;

class PostTest extends TestCase
{

    //test case for test status change to published
    public function test_post_status_change(): void
    {
        $user = User::find(1);
        $this->actingAs($user);
        $post = Post::find(1);
        $response = $this->postJson('/admin/posts/change_status', [
            'id' => $post->id,
            'status' => 1,
            'published_by' => $user->id,
            'published_at' => Carbon::now(),
        ]);
        $response->assertStatus(200);
    }


}

