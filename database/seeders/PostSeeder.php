<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\User;
use App\Models\Comment;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Database\Seeders\Traits\TruncateTable;
use Database\Factories\Helpers\FactoryHelper;
use Database\Seeders\Traits\DisableForeignKeys;

class PostSeeder extends Seeder
{
    use TruncateTable, DisableForeignKeys;
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->disableforeignkeys();

        $this->truncate('posts');

        $posts = Post::factory(100)
        ->create();

        $posts->each(function(Post $post){
            $post->users()->sync(FactoryHelper::getRandomModelId(User::class));
        });

        $this->enableforeignkeys();


    }
}
