<?php
declare(strict_types=1);

namespace App\Services\Syncer;

use App\Services\Syncer\Interfaces\SyncerInterface;

final class Syncer implements SyncerInterface
{
    private string $identifier;

    public function __construct(string $identifier)
    {
        $this->identifier = $identifier;
    }

    /**
     * @param \App\Services\Fetcher\Data\UserData[] $allUsers
     * @param \App\Services\Fetcher\Data\UserData[] $localUsers
     *
     * @return \App\Services\Fetcher\Data\UserData[]
     */
    public function sync(array $allUsers, array $localUsers): array
    {
        if (empty($localUsers) === true) {
            return $allUsers;
        }

        $newUsers = [];

        $localIdentifiers = $this->getExistingUsersByIdentifier($localUsers);

        foreach ($allUsers as $user) {
            if (\in_array($user->{$this->identifier}, $localIdentifiers, true) === false) {
                continue;
            }

            $newUsers[] = $user;
        }

        return $newUsers;
    }

    /**
     * @return string[]
     */
    private function getExistingUsersByIdentifier(array $localUsers): array
    {
        $identifiers = [];

        foreach ($localUsers as $user) {
            $identifiers[] = $user->{$this->identifier};
        }

        return $identifiers;
    }
}
