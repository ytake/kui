<?php
declare(strict_types=1);

namespace App\Http\Responder;

use Illuminate\View\Factory;
use Illuminate\Http\Response;

final class IndexResponder
{
    /** @var Factory */
    private $factory;

    /** @var Response */
    private $response;

    /**
     * @param Factory  $factory
     * @param Response $response
     */
    public function __construct(Factory $factory, Response $response)
    {
        $this->factory = $factory;
        $this->response = $response;
    }

    /**
     * @param array $payload
     *
     * @return Response
     */
    public function emit(array $payload = []): Response
    {
        // dd($payload);
        $this->response->setContent(
            $this->factory->make('home', ['topics' => $payload])
        );

        return $this->response;
    }
}
