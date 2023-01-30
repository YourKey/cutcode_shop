<?php

namespace App\Logging\Telegram;

use Monolog\Logger;

class TelegramLoggerFactory
{

    public function __invoke(array $config)
    {
        return new Logger('tg', [new TelegramLoggerHandler($config)]);
    }
}
