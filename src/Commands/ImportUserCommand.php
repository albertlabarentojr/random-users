<?php
declare(strict_types=1);

namespace App\Commands;

use App\Services\Importer\Interfaces\ImporterInterface;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

final class ImportUserCommand extends Command
{

    private ImporterInterface $importer;

    public function __construct(ImporterInterface $importer)
    {
        parent::__construct('import:random_users');

        $this->importer = $importer;
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $result = $this->importer->import();

        $this->createDisplay($output, [
            'Number of previous users: ',
            \count($result->localUsers()),
            'Number of new users: ',
            \count($result->newUsers()),
        ]);

        return 0;
    }

    private function createDisplay(OutputInterface $output, array $messages): void
    {
        $template = [
            '=====================================================================',
            '=====================================================================',
        ];

        // Inject the display here.
        \array_splice($template, 1, 0, $messages);

        $output->setDecorated(true);
        $output->writeln($template);
    }
}
