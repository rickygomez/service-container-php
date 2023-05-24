<?php

namespace App\Models;

class Storage
{
    private string $id;
    private Logger $logger;

    public function __construct()
    {
        $this->logger = new Logger();
        $this->id = 'stg-' . rand(1, 100);
    }

    public function saveAvatar(User $user): void
    {
        dump('|---Init Storage->saveAvatar()---|');
        dump("|--- * Saving the avatar user... '$user->avatar' ---|");
        $this->logger->output('test log in save avatar');
        dump('|---End Storage->saveAvatar()---|');
    }
}
