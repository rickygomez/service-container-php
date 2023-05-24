<?php

use App\Lib\Container;
use App\Models\Logger;
use App\Models\Storage;
use App\Models\User;

require_once __DIR__ . '/../vendor/autoload.php';

$container = Container::getInstance();
$container->set(
    Logger::class,
    fn (Container $container) => new Logger()
);
$container->set(
    Storage::class,
    fn (Container $container) => new Storage(
        $container->get(Logger::class)
    )
);
$container->set(
    User::class,
    fn (Container $container) => new User(
        $container->get(Storage::class)
    )
);
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
