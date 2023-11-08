<?php

namespace Database\Seeders\Traits;

use Illuminate\Support\Facades\DB;

trait DisableForeignKeys{

    protected function disableforeignkeys(){

        DB::statement('SET FOREIGN_KEY_CHECKS=0');
    }

    protected function enableforeignkeys(){

        DB::statement('SET FOREIGN_KEY_CHECKS=1');
    }
}
