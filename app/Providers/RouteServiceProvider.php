<?php

declare(strict_types=1);

namespace App\Providers;

use App\Foundation\Router\ApplicationRoute;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Routing\Router;

final class RouteServiceProvider extends ServiceProvider
{
    /**
     * @param Router $router
     */
    public function map(
        Router $router
    ): void {
        $ar = new ApplicationRoute($router);
        $ar->register();
    }
}
