<?php

use Illuminate\Database\Seeder;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::statement('SET FOREIGN_KEY_CHECKS=0');

        \App\Model\User\Category::truncate();
        \App\Model\User\Tag::truncate();
        \App\Model\User\Like::truncate();
        \App\Model\User\CategoryPost::truncate();
        \App\Model\User\PostTag::truncate();
        \App\Model\User\Post::truncate();

        \DB::statement('SET FOREIGN_KEY_CHECKS=1');

        factory(\App\Model\User\Tag::class, 60)->create();
        factory(\App\Model\User\Category::class, 20)->create();
        factory(\App\Model\User\Post::class, 40)->create();

        $posts = \App\Model\User\Post::all();
        $categories = \App\Model\User\Category::all();
        $tags = \App\Model\User\Tag::all();

        foreach ($posts as $post) {
            foreach (range(1, mt_rand(2, 4)) as $item) {
                \App\Model\User\CategoryPost::create([
                    'post_id' => $post->id,
                    'category_id' => $categories->random()->id,
                ]);
            }

            foreach (range(1, mt_rand(2, 4)) as $item) {
                \App\Model\User\PostTag::create([
                    'post_id' => $post->id,
                    'tag_id' => $tags->random()->id,
                ]);
            }

            if (mt_rand(0, 1)) {
                \App\Model\User\Like::insert([
                    'user_id' => mt_rand(1, 2),
                    'post_id' => $post->id
                ]);
            }
        }
    }
}
