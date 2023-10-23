<?php

namespace App\Command;

use App\Service\Highlander;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;

#[AsCommand(
    name: 'highlander:say',
    description: 'Add a short description for your command',
)]
class HighlanderSayCommand extends Command
{
    public function __construct(
        private Highlander $highlander,
    )
    {
        parent::__construct();
    }

    protected function configure(): void
    {
        $this
            ->addOption('threshold', 't', InputOption::VALUE_REQUIRED, 'The threshold for specifying the weather', 50)
            ->addOption('trials', 'r', InputOption::VALUE_REQUIRED, 'Count of forecasts to provide', 1)
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $io = new SymfonyStyle($input, $output);

        $threshold = $input->getOption('threshold');
        $trials = $input->getOption('trials');

        $forecasts = $this->highlander->say($threshold, $trials);

        $io->listing($forecasts);

        return Command::SUCCESS;
    }
}
