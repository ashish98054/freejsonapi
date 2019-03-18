<?php

use Illuminate\Database\Seeder;
use App\Domain\Posts\PostComment;

class PostCommentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(PostComment::class, 20)->create();
    }
}
