<?php

declare(strict_types=1);

namespace App\Foundation\Router;

use App\Http\Actions;
use Illuminate\Routing\Router;

/**
 * Class ApplicationRoute
 */
final class ApplicationRoute
{
    private $router;

    public function __construct(Router $router)
    {
        $this->router = $router;
    }

    public function register(): void
    {
        $this->router->group(
            ['middleware' => 'web'],
            function (Router $router) {
                $router->get('/', ['uses' => Actions\IndexAction::class, 'as' => 'topic.index']);
                $router->get('/topics/{name}', ['uses' => Actions\Topic\ItemAction::class, 'as' => 'topic.item']);
            }
        );
    }
}
