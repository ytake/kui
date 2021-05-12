<?php

declare(strict_types=1);

namespace App\Providers;

use Illuminate\Support\AggregateServiceProvider;
use Illuminate\Foundation\Providers\ComposerServiceProvider;

final class ConsoleServiceProvider extends AggregateServiceProvider
{
    /** @var bool */
    protected $defer = true;

    /** @var string[] */
    protected $providers = [
        ArtisanServiceProvider::class,
        ComposerServiceProvider::class,
    ];
}
