<?php

declare(strict_types=1);

namespace App\Providers;

use App\DataAccess\Kafka;
use App\Foundation\Kafka\ServerConfigure;
use GuzzleHttp\Client;
use GuzzleHttp\ClientInterface;
use Illuminate\Contracts\Container\BindingResolutionException;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\Support\DeferrableProvider;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider implements DeferrableProvider
{
    public function register(): void
    {
        $this->app->bind(
            ClientInterface::class,
            function () {
                return new Client();
            }
        );

        $this->app->singleton(
            ServerConfigure::class,
            function (Application $application) {
                return new ServerConfigure(
                    $application->make('config')->get('kafka.servers'),
                    $this->detectEnvironment($application)
                );
            }
        );

        $this->app->bind(
            Kafka\Topics::class,
            function (Application $application) {
                /** @var ServerConfigure $server */
                $server = $application[ServerConfigure::class];
                return new Kafka\Topics(
                    $application->make(ClientInterface::class),
                    $server->getKafkaRestUrl()
                );
            }
        );

        $this->app->bind(
            Kafka\TopicDetail::class,
            function (Application $application) {
                /** @var ServerConfigure $server */
                $server = $application[ServerConfigure::class];
                return new Kafka\TopicDetail(
                    $application->make(ClientInterface::class),
                    $server->getKafkaRestUrl()
                );
            }
        );
    }

    public function provides(): array
    {
        return [
            ClientInterface::class,
            ServerConfigure::class,
            Kafka\Topics::class,
            Kafka\TopicDetail::class,
        ];
    }

    /**
     * @param Application $application
     * @return string
     * @throws BindingResolutionException
     */
    private function detectEnvironment(Application $application): string
    {
        return $application->make('config')->get('app.env');
    }
}
