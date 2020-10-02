<?php
declare(strict_types=1);

namespace App\Services\Importer\Data;

final class ImportResult
{
    private array $localUsers;

    /**
     * @var \App\Services\Fetcher\Data\UserData[]
     */
    private array $newUsers;

    /**
     * @var \App\Services\Fetcher\Data\UserData[]
     */
    private array $fetchedUsers;

    /**
     * @var \App\Services\Fetcher\Data\UserData[] $fetchedUsers
     * @var \App\Services\Fetcher\Data\UserData[] $newUsers
     * @var \App\Services\Fetcher\Data\UserData[] $localUsers
     */
    public function __construct(array $fetchedUsers, array $newUsers, array $localUsers)
    {
        $this->fetchedUsers = $fetchedUsers;
        $this->newUsers = $newUsers;
        $this->localUsers = $localUsers;
    }

    /**
     * @return \App\Services\Fetcher\Data\UserData[]
     */
    public function fetchedUsers(): array
    {
        return $this->fetchedUsers;
    }

    /**
     * @return \App\Services\Fetcher\Data\UserData[]
     */
    public function newUsers(): array
    {
        return $this->newUsers;
    }

    /**
     * @return \App\Services\Fetcher\Data\UserData[]
     */
    public function localUsers(): array
    {
        return $this->localUsers;
    }
}
