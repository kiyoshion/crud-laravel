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
        DB::table('posts')->truncate();

        $posts = [
            [
                'title' => 'サンプル１',
                'user_id' => '1',
                'body' => 'サンプル本文１'
            ],
            [
                'title' => 'サンプル２',
                'user_id' => '1',
                'body' => 'サンプル本文２'
            ]
        ];

        foreach($posts as $post) {
            \App\Post::create($post);
        }
    }
}
