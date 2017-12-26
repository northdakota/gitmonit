<?php

use Phalcon\Cli\Task;
use TelegramBot\Api\BotApi;

class RegisterTask extends Task
{
    public function mainAction()
    {
        $bot = new BotApi($this->getDI()->get('config')->bot->api_key);
        $result = $bot->setWebhook($this->getDI()->get('config')->bot->web_hook);
        if ($result) {
            echo 'Webhook successfully seted';

            return;
        }

        echo 'Error. Webhook not seted';
    }
}