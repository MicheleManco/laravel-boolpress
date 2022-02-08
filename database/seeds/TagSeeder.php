<?php

use Illuminate\Database\Seeder;
use App\Tag;
use App\Post;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Tag::class,10)->create()->each(function($tag){
            $posts = Post::inRandomOrder()->limit(rand(0,10))->get();
            $tag->posts()->attach($posts);
            $tag->save();
        });
    }
}
