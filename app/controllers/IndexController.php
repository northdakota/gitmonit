<?php

use TelegramBot\Api\Client;
use TelegramBot\Api\Exception;
use TelegramBot\Api\Types\Message;

/**
 * Class IndexController
 */
class IndexController extends ControllerBase
{

    public function indexAction()
    {
        try {
            $bot = new Client($this->getDI()->get('config')->bot->api_key);
            $this->addRepoCommand($bot);
            $bot->run();
        } catch (Exception $e) {
            $e->getMessage();
        }
    }

    protected function addRepoCommand(Client $bot)
    {
        $bot->command('addrepo', function (Message $message) use ($bot) {
            $text = $message->getText();
            $text = str_replace('/addrepo', '', $text);
            $text = trim($text);

            if (!$text) {
                $bot->sendMessage($message->getChat()->getId(), 'Wrong format!');
            }

            $repos = explode("\n", $text);
            foreach ($repos as $url) {
                $path = parse_url($url, PHP_URL_PATH);
                $path = trim($path, '/');
                list($user, $repo) = explode('/', $path);
                if (!$user || !$repo) {
                    $bot->sendMessage($message->getChat()->getId(), 'Wrong format!');
                }
                $repoModel = new Repo();
                $repoModel->setChatId($message->getChat()->getId());
                $repoModel->setBranches(json_encode([]));
                $repoModel->setLastMasterCommit('');
                $repoModel->setReleases(json_encode([]));
                $repoModel->setRepository($repo);
                $repoModel->setUser($user);
                $repoModel->save();
            }
            $bot->sendMessage($message->getChat()->getId(), 'Done!');
        });
    }

}

