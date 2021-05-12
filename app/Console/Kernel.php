<?php
declare(strict_types=1);

namespace App\Console;

use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use App\Console\Application as ConsoleApplication;

use function sprintf;

/**
 * Class Kernel
 */
final class Kernel extends ConsoleKernel
{
    protected function getArtisan()
    {
        if (is_null($this->artisan)) {
            $this->artisan = (new ConsoleApplication(
                $this->app,
                $this->events,
                $this->app->version())
            )
                ->resolveCommands($this->commands);
            $this->artisan->setName($this->displayName());

            return $this->artisan;
        }

        return $this->artisan;
    }

    /**
     * @return string
     */
    private function displayName(): string
    {
        return sprintf("%s\npowered by %s", $this->applicationName(), $this->artisan->getName());
    }

    /**
     * @return string
     */
    private function applicationName(): string
    {
        return '
  _  __      __ _           _    _ _____ 
 | |/ /     / _| |         | |  | |_   _|
 | \' / __ _| |_| | ____ _  | |  | | | |  
 |  < / _` |  _| |/ / _` | | |  | | | |  
 | . \ (_| | | |   < (_| | | |__| |_| |_ 
 |_|\_\__,_|_| |_|\_\__,_|  \____/|_____|';

    }
}
