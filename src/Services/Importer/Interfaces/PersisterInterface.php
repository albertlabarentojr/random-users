<?php
declare(strict_types=1);

namespace App\Services\Importer\Interfaces;

interface PersisterInterface
{
    /**
     * @param mixed $object
     *
     * @return mixed
     */
    public function persist($object);

    /**
     * @return mixed[]
     */
    public function all(): array;
}
