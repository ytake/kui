<?php

declare(strict_types=1);

namespace App\Foundation\Kafka;

use function array_key_exists;

final class ServerConfigure
{
    /** @var string[] */
    private array $config;

    /**
     * @param array $config
     * @param string $environment
     */
    public function __construct(
        array $config,
        string $environment
    ) {
        $this->config = $this->retrieveConfigure($config, $environment);
    }

    /**
     * @return string
     */
    public function getKafkaRestUrl(): string
    {
        return $this->config['kafka-rest'] ?? '';
    }

    /**
     * @return string
     */
    public function getKsqlUrl(): string
    {
        return $this->config['ksql-server'] ?? '';
    }

    /**
     * @param array $config
     * @param string $environment
     *
     * @return array
     */
    private function retrieveConfigure(array $config, string $environment): array
    {
        if (array_key_exists($environment, $config)) {
            return $config[$environment];
        }
        return [];
    }
}
