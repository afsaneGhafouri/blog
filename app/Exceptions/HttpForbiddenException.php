<?php

namespace App\Exceptions;

use Exception;

class HttpForbiddenException extends Exception
{
    public function render($exception)
    {
        if (request()->isJson()){
            return response()->json('Forbidden', 403);
        }
    }
}
