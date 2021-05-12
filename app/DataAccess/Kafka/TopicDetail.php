<?php

declare(strict_types=1);

namespace App\DataAccess\Kafka;

use Fig\Http\Message\RequestMethodInterface;
use GuzzleHttp\Utils;

use function sprintf;


class TopicDetail extends AbstractKafkaStorage
{
    /** @var string */
    protected string $uri = '/topics/%s';

    /**
     * @param string $topicName
     *
     * @return array
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function retrieveTopic(string $topicName): array
    {
        $response = $this->client->request(
            RequestMethodInterface::METHOD_GET,
            $this->getUri($this->host, sprintf($this->getUriFormat(), $topicName)),
            $this->headers()
        );
        return Utils::jsonDecode($response->getBody()->getContents());
    }
}
