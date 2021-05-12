<?php

declare(strict_types=1);

namespace App\Http\Actions;

use App\Http\Responder\IndexResponder;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

final class IndexAction
{
    /**
     * @param IndexResponder $responder
     * @param Request $request
     */
    public function __construct(
        private IndexResponder $responder,
        private Request $request
    ) {
    }

    public function __invoke(): Response
    {
    }
}
