<?php

use App\Models\Logger;
use App\Models\Storage;
use App\Models\User;

require_once __DIR__ . '/../vendor/autoload.php';
$user = new User(new Storage(new Logger()));
$user->name = 'test';
$user->email = 'test@teste.com';
$user->avatar = 'test.png';
dump('User informations');
dump($user);
dump('|Init Index.php|');
$user->save();
dump('|End Index.php|');
