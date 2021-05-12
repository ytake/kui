<?php

declare(strict_types=1);

namespace App\DataAccess\Kafka;

use Fig\Http\Message\RequestMethodInterface;
use GuzzleHttp\Utils;

/**
 * Class Topics
 */
class Topics extends AbstractKafkaStorage
{
    /** @var string */
    protected string $uri = '/topics';

    /**
     * @return array
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function activeTopics(): array
    {
        $response = $this->client->request(
            RequestMethodInterface::METHOD_GET,
            $this->getUri($this->host, $this->getUriFormat()),
            $this->headers()
        );
        return Utils::jsonDecode($response->getBody()->getContents());
    }
}
