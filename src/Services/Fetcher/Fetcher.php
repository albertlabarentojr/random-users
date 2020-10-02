<?php
declare(strict_types=1);

namespace App\Services\Fetcher;

use App\Client\Interfaces\RandomUserClientInterface;
use App\Services\Fetcher\Interfaces\FetcherConfigurationProviderInterface;
use App\Services\Fetcher\Interfaces\FetcherInterface;
use App\Services\Fetcher\Interfaces\UserDataMapperInterface;

final class Fetcher implements FetcherInterface
{
    private RandomUserClientInterface $client;

    private FetcherConfigurationProviderInterface $config;

    private UserDataMapperInterface $mapper;

    public function __construct(
        RandomUserClientInterface $client,
        FetcherConfigurationProviderInterface $config,
        UserDataMapperInterface $mapper
    ) {
        $this->client = $client;
        $this->config = $config;
        $this->mapper = $mapper;
    }

    /**
     * @return \App\Services\Fetcher\Data\UserData[]
     */
    public function fetch(): array
    {
        $results = $this->client->getUsers($this->config->getNationality(), $this->config->getMaxResult());

        return $this->mapper->map($results->toArray(true)['results']);
    }
}
