<?php

namespace Database\Seeders;

use App\Models\Image;
use App\Models\Post;
use Illuminate\Database\Seeder;

class ImageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Post::all()->each(function ($post){
            Image::factory()->create(['post_id' => $post->id]);

//            $image = Image::factory()->make();
//            $image->post_id = $post->id;
//            $image->save();
        });
    }
}
