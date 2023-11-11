<?php

namespace App\Helpers\Routes;

class RouteHelper{
    public static function includeRouteFiles(string $folder){
        $directoryIterator = new \RecursiveDirectoryIterator($folder);
        $it = new \RecursiveIteratorIterator($directoryIterator);
        while($it->valid()){
            if(!$it->isDot() && $it->isFile()
            && $it->isReadable() && $it->current()->getExtension()==='php')
            {
                require $it->key();
            }
                $it->next();
        }

    }
}
