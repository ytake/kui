<?php
declare(strict_types=1);

return [
    'servers' => [
        'local' => [
            'kafka-rest' => env('DEVELOP_KAFKA_REST', 'http://localhost:8082'),
            'ksql-server' => env('DEVELOP_KSQL_SERVER', 'http://localhost:8088'),
        ],
    ]
];
