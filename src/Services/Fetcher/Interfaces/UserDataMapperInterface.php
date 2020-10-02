<?php
declare(strict_types=1);

namespace App\Services\Fetcher\Interfaces;

interface UserDataMapperInterface
{
    /**
     * @param mixed[] $results
     *
     * @return \App\Services\Fetcher\Interfaces\UserDataMapperInterface[]
     */
    public function map(array $results): array;
}
