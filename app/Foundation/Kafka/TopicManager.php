<?php

declare(strict_types=1);

namespace App\Foundation\Kafka;

use App\Foundation\Kafka\TopicDriver;
use Illuminate\Support\Manager;

/**
 * Class TopicManager
 */
class TopicManager extends Manager
{
    /** @var string[] */
    protected $jsonTopics = [
        "_schemas"
    ];

    /** @var string[] */
    protected $binaryTopics = [
        "connect-configs",
        "connect-offsets",
        "__consumer_offsets",
        "_confluent-monitoring",
        "_confluent-controlcenter",
        "connect-statuses",
        "__confluent.support.metr"
    ];

    /** @var string[] */
    protected $controlTopics = [
        "_confluent-controlcenter",
        "_confluent-command",
        "_confluent-metrics",
        "connect-configs",
        "connect-offsets",
        "__confluent",
        "__consumer_offsets",
        "_confluent-monitoring",
        "connect-status",
        "_schemas"
    ];

    protected function createControlDriver(): TopicDriver\DriverInterface
    {
        return new TopicDriver\ControlDriver($this->controlTopics);
    }

    protected function createBinaryDriver(): TopicDriver\DriverInterface
    {
        return new TopicDriver\BinaryDriver($this->binaryTopics);
    }

    protected function createJsonDriver(): TopicDriver\DriverInterface
    {
        return new TopicDriver\JsonDriver($this->controlTopics);
    }

    public function getDefaultDriver(): string
    {
        return 'control';
    }
}
