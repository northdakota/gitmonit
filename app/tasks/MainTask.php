<?php

use Github\Client;
use Phalcon\Cli\Task;
use TelegramBot\Api\BotApi;

class MainTask extends Task
{
    public function mainAction()
    {
        $bot = new BotApi($this->getDI()->get('config')->bot->api_key);
        $client = new Client();

        /** @var Repo $repoModel */
        foreach (\Repo::find() as $repoModel) {
            $lastCommitHash = $this->getLastCommitHash($client, $repoModel->getUser(), $repoModel->getRepository());
            if ($lastCommitHash !== $repoModel->getLastMasterCommit()) {
                $bot->sendMessage($repoModel->getChatId(), 'New commit in master branch for repository: https://github.com/' . $repoModel->getUser() . '/' . $repoModel->getRepository());
                $repoModel->setLastMasterCommit($lastCommitHash);
                $repoModel->save();
            }
        }

    }

    /**
     * @param Client $client
     * @param $user string
     * @param $repo string
     * @return bool|mixed
     */
    public function getLastCommitHash(Client $client, $user, $repo)
    {
        $commits = $client->api('repo')->commits()->all($user, $repo, ['sha' => 'master']);
        $lastCommit = array_shift($commits);
        if (is_array($lastCommit) && isset($lastCommit['sha'])) {
            return $lastCommit['sha'];
        }

        return false;
    }
}