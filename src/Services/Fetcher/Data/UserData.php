<?php
declare(strict_types=1);

namespace App\Services\Fetcher\Data;

use Spatie\DataTransferObject\DataTransferObject;

final class UserData extends DataTransferObject
{
    public ?string $firstName = null;

    public ?string $lastName = null;

    public ?string $email = null;

    public ?string $username = null;

    public ?string $password = null;

    public ?string $gender = null;

    public ?string $country = null;

    public ?string $city = null;

    public ?string $phone = null;
}
