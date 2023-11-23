<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Http\Request;

class GeneralJsonException extends Exception
{
    public function report(){}

    public function render($request)
    {
        return new JsonResponse([
            'error'=>[
                'message'=>$this->getMessage()
            ],
            $this->getCode()]);
    }
}
