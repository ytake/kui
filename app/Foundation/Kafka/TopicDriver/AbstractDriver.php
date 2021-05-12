<?php

declare(strict_types=1);

namespace App\Foundation\Kafka\TopicDriver;

use function array_filter;
use function count;

abstract class AbstractDriver implements DriverInterface
{
    /**
     * AbstractDriver constructor.
     * @param array $items
     */
    public function __construct(
        protected array $items
    ) {
    }

    public function isControlTopic(
        string $topic
    ): bool {
        return 0 !== count(
                array_filter(
                    $this->items,
                    fn(string $row) => $row === $topic
                )
            );
    }

    public function all(): array
    {
        return $this->items;
    }
}
