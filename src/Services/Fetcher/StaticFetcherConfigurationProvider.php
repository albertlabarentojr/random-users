<?php
declare(strict_types=1);

namespace App\Services\Fetcher;

use App\Services\Fetcher\Interfaces\FetcherConfigurationProviderInterface;

final class StaticFetcherConfigurationProvider implements FetcherConfigurationProviderInterface
{
    public function getMaxResult(): int
    {
        return 100;
    }

    public function getNationality(): string
    {
        return 'AU';
    }
}
