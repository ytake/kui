<?php

declare(strict_types=1);

namespace App\Console;

use Illuminate\Console\Application as ConsoleApplication;
use Illuminate\Contracts\Container\Container;
use Illuminate\Contracts\Events\Dispatcher;

final class Application extends ConsoleApplication
{
    public function __construct(
        Container $laravel,
        Dispatcher $events,
        string $version
    ) {
        parent::__construct($laravel, $events, $version);
    }
}
