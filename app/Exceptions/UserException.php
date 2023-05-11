<?php

namespace App\Exceptions;

use Exception;

class UserException extends Exception
{
    public function render($request)
    {
        return response()->json([
            'error' => $this->getMessage()
        ]);
    }
}
