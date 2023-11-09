<?php

namespace Database\Factories\Helpers;

class FactoryHelper{
    /** this function will get a random model id from the database.
     *  @param string | hasFactory $model
     */
    public static function getRandomModelId($model){

        $count = $model::query()->count();
        if($count === 0){
            return $model::factory()->create()->id;
        }else{
            return rand(1, $count);
        }

    }
}
