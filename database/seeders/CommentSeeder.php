<?php

namespace Database\Seeders;

use App\Models\Comment;
use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Seeder;

class CommentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Comment::factory()->times(500)->make()->each(function ($comment){
            $user = User::inRandomOrder()->first();
            $post = Post::inRandomOrder()->first();
            $comment->user_id = $user->id;
            $comment->post_id = $post->id;
            $comment->save();
        });
    }
}
