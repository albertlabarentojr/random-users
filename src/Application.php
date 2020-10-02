<?php
declare(strict_types=1);

namespace App;

use App\Providers\RandomUserServiceProvider;
use Illuminate\Container\Container;
use Psr\Container\ContainerInterface;

final class Application
{
    public static function run(): ContainerInterface
    {
        $container = new Container();

        (new RandomUserServiceProvider($container))->register();

        return $container;
    }
}
