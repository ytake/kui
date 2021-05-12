<?php

declare(strict_types=1);

namespace App\Providers;

use Illuminate\Foundation\Providers\ArtisanServiceProvider as ArtisanProvider;

final class ArtisanServiceProvider extends ArtisanProvider
{
    /** @var string[] */
    protected $commands = [
        'CacheClear' => 'command.cache.clear',
        'CacheForget' => 'command.cache.forget',
        'ClearCompiled' => 'command.clear-compiled',
        'ConfigCache' => 'command.config.cache',
        'ConfigClear' => 'command.config.clear',
        'Environment' => 'command.environment',
        'KeyGenerate' => 'command.key.generate',
        'Optimize' => 'command.optimize',
        'OptimizeClear' => 'command.optimize.clear',
        'PackageDiscover' => 'command.package.discover',
        'RouteCache' => 'command.route.cache',
        'RouteClear' => 'command.route.clear',
        'RouteList' => 'command.route.list',
        'ViewCache' => 'command.view.cache',
        'ViewClear' => 'command.view.clear',
    ];

    /** @var string[] */
    protected $devCommands = [
        'VendorPublish' => 'command.vendor.publish',
    ];
}
