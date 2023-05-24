<?php

namespace App\Lib;

class Container
{
    private array $instances = [];
    private static Container $instance;

    private function __construct()
    {
    }

    public static function getInstance(): Container
    {
        if (!isset(self::$instance)) {
            $instance = new self();
        }
        return $instance;
    }

    public function set(string $key, $value): void
    {
        $this->instances[$key] = $value;
    }

    public function get(string $key)
    {
        $reflatedClass = new \ReflectionClass($this->instances[$key] ?? $key);

        if (!$reflatedClass->getConstructor()) {
            return $reflatedClass->newInstance();
        }

        $parameters = $reflatedClass->getConstructor()->getParameters();
        $parameters = array_map(function ($parameter) {
            $type = $parameter->getType();
            return $this->get($type->getName());
        }, $parameters);

        if (count($parameters)) {
            return $reflatedClass->newInstanceArgs($parameters);
        }

        return $reflatedClass->newInstance();
    }
}
