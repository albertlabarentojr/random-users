<?php
declare(strict_types=1);

namespace App\Client;

use App\Client\Interfaces\RandomUserClientInterface;
use Symfony\Contracts\HttpClient\HttpClientInterface;
use Symfony\Contracts\HttpClient\ResponseInterface;

final class RandomUserClient implements RandomUserClientInterface
{
    private HttpClientInterface $client;

    public function __construct(HttpClientInterface $client)
    {
        $this->client = $client;
    }

    public function getUsers(string $nationality, int $maxResult): ResponseInterface
    {
        return $this->client->request(
            'GET',
            'https://randomuser.me/api?' . \http_build_query([
                'results' => $maxResult,
                'nat' => $nationality
            ])
        );
    }
}
