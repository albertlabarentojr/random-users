<?php
declare(strict_types=1);

namespace App\Client\Interfaces;

use Symfony\Contracts\HttpClient\ResponseInterface;

interface RandomUserClientInterface
{
    public function getUsers(string $nationality, int $maxResult): ResponseInterface;
}
