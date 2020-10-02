<?php
declare(strict_types=1);

namespace App\Services\Syncer\Interfaces;

interface SyncerInterface
{
    /**
     * @param \App\Services\Fetcher\Data\UserData[] $allUsers
     * @param \App\Services\Fetcher\Data\UserData[] $localUsers
     *
     * @return \App\Services\Fetcher\Data\UserData[]
     */
    public function sync(array $allUsers, array $localUsers): array;
}
