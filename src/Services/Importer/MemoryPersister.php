<?php
declare(strict_types=1);

namespace App\Services\Importer;

use App\Services\Importer\Interfaces\PersisterInterface;

final class MemoryPersister implements PersisterInterface
{
    private \SplFixedArray $records;

    public function __construct()
    {
        $this->records = (new \SplFixedArray());
    }

    public function all(): array
    {
        return $this->records->toArray();
    }

    public function persist($object)
    {
        $this->records[] = $object;
    }
}
