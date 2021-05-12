<?php

declare(strict_types=1);

namespace App\DataAccess\Kafka;

use App\DataAccess\UrlBuilderTrait;
use GuzzleHttp\ClientInterface;

/**
 * Class AbstractKafkaStorage
 */
abstract class AbstractKafkaStorage
{
    /** @var string */
    protected string $uri = '';

    use UrlBuilderTrait;

    /**
     * @param ClientInterface $client
     * @param string $host
     */
    public function __construct(
        protected ClientInterface $client,
        protected string $host = ''
    ) {
    }

    protected function getUriFormat(): string
    {
        return $this->uri;
    }

    protected function headers(): array
    {
        return [
            'Accept' => 'application/vnd.kafka.v2+json',
        ];
    }
}
