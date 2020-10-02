<?php
declare(strict_types=1);

namespace App\Providers;

use App\Client\Interfaces\RandomUserClientInterface;
use App\Client\RandomUserClient;
use App\Services\Fetcher\Fetcher;
use App\Services\Fetcher\Interfaces\FetcherConfigurationProviderInterface;
use App\Services\Fetcher\Interfaces\FetcherInterface;
use App\Services\Fetcher\Interfaces\UserDataMapperInterface;
use App\Services\Fetcher\StaticFetcherConfigurationProvider;
use App\Services\Fetcher\UserDataMapper;
use App\Services\Importer\Importer;
use App\Services\Importer\Interfaces\ImporterInterface;
use App\Services\Importer\Interfaces\PersisterInterface;
use App\Services\Importer\MemoryPersister;
use App\Services\Syncer\Interfaces\SyncerInterface;
use App\Services\Syncer\Syncer;
use Illuminate\Container\Container;
use Symfony\Component\HttpClient\HttpClient;
use Symfony\Contracts\HttpClient\HttpClientInterface;

final class RandomUserServiceProvider
{
    /** @var string  */
    private const SYNCER_IDENTIFER = 'email';

    private Container $container;

    public function __construct(Container $container)
    {
        $this->container = $container;
    }

    public function register(): void
    {
        $this->container->singleton(HttpClientInterface::class, static function (): HttpClientInterface {
            return HttpClient::create();
        });
        $this->container->bind(RandomUserClientInterface::class, RandomUserClient::class);

        // eg. FromEnvConfigurationProvider, FromYamlConfigurationProvider
        $this->container->bind(
            FetcherConfigurationProviderInterface::class,
            StaticFetcherConfigurationProvider::class
        );
        $this->container->bind(UserDataMapperInterface::class, UserDataMapper::class);
        $this->container->bind(
            FetcherConfigurationProviderInterface::class,
            StaticFetcherConfigurationProvider::class
        );
        $this->container->bind(FetcherInterface::class, Fetcher::class);

        $this->container->bind(SyncerInterface::class, static function (): SyncerInterface {
            return new Syncer(self::SYNCER_IDENTIFER);
        });

        $this->container->singleton(PersisterInterface::class, MemoryPersister::class);
        $this->container->singleton(ImporterInterface::class, Importer::class);
    }
}
