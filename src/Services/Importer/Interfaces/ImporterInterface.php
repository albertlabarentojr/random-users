<?php
declare(strict_types=1);

namespace App\Services\Importer\Interfaces;

use App\Services\Importer\Data\ImportResult;

interface ImporterInterface
{
    public function import(): ImportResult;
}
