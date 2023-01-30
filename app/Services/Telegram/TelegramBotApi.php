<?php

namespace App\Services\Telegram;

use App\Exceptions\TelegramApiException;
use Illuminate\Support\Facades\Http;

class TelegramBotApi
{
    public const HOST = 'https://api.telegram.org/bot';

    /**
     * @throws TelegramApiException
     */
    public static function sendMessage(string $token, int $chatId, string $text): bool
    {
        $response = Http::get(self::HOST . $token . '/sendMessage', [
            'chat_id' => $chatId,
            'text' => $text,
        ]);
        if (!$response->ok() || !isset($response->json()['ok'])) {
            throw new TelegramApiException(
                "Telegram API return bad response status ({$response->status()}) or body"
            );
        }
        if ($response->json()['ok']) {
            return true;
        }
        return false;
    }
}
