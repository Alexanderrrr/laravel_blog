<?php

use Illuminate\Database\Seeder;
use App\Tag;
use App\Post;

class TagsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $values = [
          'Blogging',
          'Freelancing',
          'How to Succeed'
        ];

        Tag::truncate();
        foreach ($values as $value) {
            Tag::create([
              'name' => $value
            ]);
        }

        Post::all()->each(function (Post $post) {
          $randIs = Tag::inRandomOrder()
               ->select('id')
               ->take(2)
               ->pluck('id');
            $post->tags()->attach($randIs);
        });
    }
}
