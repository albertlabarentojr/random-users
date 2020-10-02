<?php
declare(strict_types=1);

namespace App\Services\Importer;

use App\Services\Importer\Data\ImportResult;
use App\Services\Importer\Interfaces\PersisterInterface;
use App\Services\Importer\Interfaces\ImporterInterface;
use App\Services\Fetcher\Interfaces\FetcherInterface;
use App\Services\Syncer\Interfaces\SyncerInterface;

final class Importer implements ImporterInterface
{
    private FetcherInterface $fetcher;

    private PersisterInterface $persister;

    private SyncerInterface $syncer;

    public function __construct(FetcherInterface $fetcher, PersisterInterface $persister, SyncerInterface $syncer)
    {
        $this->fetcher = $fetcher;
        $this->persister = $persister;
        $this->syncer = $syncer;
    }

    public function import(): ImportResult
    {
        $fetchedUsers = $this->fetcher->fetch();

        /** @var \App\Services\Fetcher\Data\UserData[] $localUsers */
        $localUsers = $this->persister->all();

        $newUsers = $this->syncer->sync($fetchedUsers, $localUsers);

        return new ImportResult($fetchedUsers, $newUsers, $localUsers);
    }
}
