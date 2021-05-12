<?php
declare(strict_types=1);

namespace App\Foundation\Kafka\TopicDriver;

/**
 * Interface DriverInterface
 */
interface DriverInterface
{
    /**
     * @param string $topic
     *
     * @return bool
     */
    public function isControlTopic(string $topic): bool;

    /**
     * @return array
     */
    public function all(): array;
}
