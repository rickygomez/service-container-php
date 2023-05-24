<?php

namespace App\Models;

class Logger
{
    public function output(string $message): void
    {
        dump('|----Init Logger->output()----|');
        dump("|---- * $message ----|");
        dump('|----End Logger->output()----|');
    }
}
