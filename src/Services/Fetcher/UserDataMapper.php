<?php
declare(strict_types=1);

namespace App\Services\Fetcher;

use App\Services\Fetcher\Data\UserData;
use App\Services\Fetcher\Interfaces\UserDataMapperInterface;

final class UserDataMapper implements UserDataMapperInterface
{
    /**
     * @param mixed[] $results
     *
     * @return \App\Services\Fetcher\Data\UserData[]
     */
    public function map(array $results): array
    {
        $users = [];

        foreach ($results as $user) {
            $users[] = new UserData([
                'firstName' => $user['name']['first'] ?? null,
                'lastName' => $user['name']['last'] ?? null,
                'email' => $user['email'] ?? null,
                'username' => $user['login']['username'] ?? null,
                'password' => \md5($user['login']['password'] ?? null),
                'gender' => $user['gender'] ?? null,
                'country' => $user['location']['country'] ?? null,
                'city' => $user['location']['city'] ?? null,
                'phone' => $user['phone'] ?? null,
            ]);
        }

        return $users;
    }
}
