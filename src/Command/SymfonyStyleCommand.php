<?php

namespace App\Command;

use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;

#[AsCommand(
    name: 'app:symfony-style',
    description: 'Demonstrate various styles',
)]
class SymfonyStyleCommand extends Command
{
    public function __construct()
    {
        parent::__construct();
    }

    protected function configure(): void
    {
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $io = new SymfonyStyle($input, $output);

//        $io->writeln('This is writeln()');
//        $io->title('This is a title()');
//        $io->section('This is a section()');
//
//        $io->note('This is a note()');
//        $io->warning('This is a warning()');
//        $io->success('This is a success()');
//        $io->error('This is an error()');
//        $io->info('This is an info()');
//        $io->caution('This is a caution()');


//        $name = $io->ask('What is your name?');
//        $output->writeln($name);
//
//        $password = $io->askHidden('What is your password');
//        $output->writeln($password);

//        $result = $io->confirm('Are you sure?');
//        $output->writeln($result ? 'Yes' : 'No');

//        $result = $io->choice('What is the correct answer?', ['A', 'B', 'C']);
//        $output->writeln($result);

//        $items = ['apple', 'pear', 'pineapple'];
//        $io->listing($items);

//        $io->horizontalTable(['Name', 'Country'], [
//            ['Stettin', 'PL'],
//            ['Warswaw', 'PL'],
//            ['Berlin', 'DE'],
//        ]);

        $items = ['apple', 'pear', 'pineapple', 'plum'];

        $io->progressStart(4);
        foreach ($items as $item) {
            $io->progressAdvance();
            sleep(2); // heavy processing
        }
        $io->progressFinish();




        return Command::SUCCESS;
    }
}
