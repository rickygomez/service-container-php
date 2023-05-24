<?php

use App\Lib\Container;
use App\Models\Logger;
use App\Models\Storage;
use App\Models\User;

require_once __DIR__ . '/../vendor/autoload.php';

$container = Container::getInstance();
$container->set(User::class, User::class);
$container->set(Storage::class, Storage::class);
// Removed Looger from set because the container will resolve the dependency automatically using the key
//$container->set(Logger::class, Logger::class); 

dump('Container informations');
dump($container);

$user = $container->get(User::class);
$user->name = 'test';
$user->email = 'test@teste.com';
$user->avatar = 'test.png';
dump('User informations');
dump($user);

$user2 = $container->get(User::class);
dump('User2 informations');
dump($user2);

dump('Integer object handle');
dump([
    'newuser' => spl_object_id(new User(new Storage(new Logger()))),
    'user' => spl_object_id($user),
    'user2' => spl_object_id($user2),
    'container' => spl_object_id($container),
]);

dump('|Init Index.php|');
$user->save();
dump('|End Index.php|');
