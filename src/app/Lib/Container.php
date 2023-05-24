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
        return $this->instances[$key]($this);
    }
}
