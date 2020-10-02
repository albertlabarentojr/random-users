<?php
declare(strict_types=1);

namespace App\Services\Fetcher\Interfaces;

interface FetcherConfigurationProviderInterface
{
    public function getMaxResult(): int;

    public function getNationality(): string;
}
