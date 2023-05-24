<?php
require_once __DIR__ . '/../vendor/autoload.php';
$user = new App\Models\User();
$user->name = 'test';
$user->email = 'test@teste.com';
$user->avatar = 'test.png';
dump('User informations');
dump($user);
dump('|Init Index.php|');
$user->save();
dump('|End Index.php|');
