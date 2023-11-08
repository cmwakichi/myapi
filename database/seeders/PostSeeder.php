<?php

namespace Database\Seeders;

use Database\Seeders\Traits\TruncateTable;
use Database\Seeders\Traits\DisableForeignKeys;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

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

        \App\Models\Post::factory(3)->create();

        $this->enableforeignkeys();


    }
}
