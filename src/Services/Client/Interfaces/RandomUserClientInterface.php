<?php
declare(strict_types=1);

namespace App\Services\Client\Interfaces;

use Symfony\Contracts\HttpClient\ResponseInterface;

interface RandomUserClientInterface
{
    public function getUsers(string $nationality, int $maxResult): ResponseInterface;
}
