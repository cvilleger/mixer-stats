<?php

namespace App\Command;

use App\Service\MixerService;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;

class MixerCommand extends Command
{
    protected static $defaultName = 'app:mixer';
    private $mixerService;

    public function __construct(MixerService $mixerService)
    {
        $this->mixerService = $mixerService;
        parent::__construct();
    }

    protected function configure()
    {
        $this->setDescription('Store the best current viewed french channels info');
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $io = new SymfonyStyle($input, $output);
        $io->title('Starting Mixer Command...');

        $this->mixerService->storeDataFromExternalApi();

        $io->success('Success !');

        return 0;
    }
}
