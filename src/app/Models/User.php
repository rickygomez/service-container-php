<?php

namespace App\Models;

use App\Models\Storage;

class User
{
    public string $id;
    public string $name;
    public string $email;
    public string $avatar;
    private Storage $storage;

    public function __construct()
    {
        $this->storage = new Storage();
        $this->id = 'use-' . rand(1, 100);
    }

    public function save(): void
    {
        dump('|--Init User->save()--|');
        $this->storage->saveAvatar($this);
        dump('|-- * Saving the user --|');
        dump('|--End User->save()--|');
    }
}
