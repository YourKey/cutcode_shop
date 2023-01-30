<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Http\JsonResponse;

class TelegramApiException extends Exception
{
    public function render(): JsonResponse
    {
        return response()->json([
                                    'error' => $this->getMessage(),
                                ]);
    }
}
