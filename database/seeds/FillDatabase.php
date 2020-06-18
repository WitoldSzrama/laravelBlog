<?php

use Illuminate\Database\Seeder;
use App\Models\Tag;
use App\Models\User;
use App\Models\Comment;
use App\Models\Post;

class FillDatabase extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = factory(User::class)->create()->id;
        factory(Tag::class, 10)->create();
        for ($i = 0 ; $i < 10; $i++) {
            $post = factory(Post::class)->create(['user_id' => $user]);
            $post->tags()->attach([rand(0, 5), rand(5,9)]);
            factory(Comment::class,10)->create(['post_id' => $post]);
        }
    }
}
