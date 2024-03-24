<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Support\Facades\Log;

class InvalidDataException extends Exception
{
    public function report(Exception $exception)
    {
        Log::error('Rider not found for given id: ' . $exception->getMessage());
    }
}
