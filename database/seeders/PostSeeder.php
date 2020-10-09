<?php

namespace Database\Seeders;


use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Post::factory()->times(100)->make()->each(function (Post $post) {
            $user = User::inRandomOrder()->first();
            $post->user_id = $user->id;
            $post->save();
        });
    }
}
