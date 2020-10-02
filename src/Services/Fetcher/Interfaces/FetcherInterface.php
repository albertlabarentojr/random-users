<?php
declare(strict_types=1);

namespace App\Services\Fetcher\Interfaces;

interface FetcherInterface
{
    /**
     * @return \App\Services\Fetcher\Data\UserData[]
     */
    public function fetch(): array;
}
