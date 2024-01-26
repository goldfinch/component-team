<?php

namespace Goldfinch\Component\Team\Commands;

use Goldfinch\Taz\Console\GeneratorCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\ArrayInput;

#[AsCommand(name: 'vendor:component-team')]
class TeamSetCommand extends GeneratorCommand
{
    protected static $defaultName = 'vendor:component-team';

    protected $description = 'Set of all [goldfinch/component-team] commands';

    protected $no_arguments = true;

    protected function execute($input, $output): int
    {
        $command = $this->getApplication()->find(
            'vendor:component-team:ext:admin',
        );
        $input = new ArrayInput(['name' => 'TeamAdmin']);
        $command->run($input, $output);

        $command = $this->getApplication()->find(
            'vendor:component-team:ext:config',
        );
        $input = new ArrayInput(['name' => 'TeamConfig']);
        $command->run($input, $output);

        $command = $this->getApplication()->find(
            'vendor:component-team:ext:block',
        );
        $input = new ArrayInput(['name' => 'TeamBlock']);
        $command->run($input, $output);

        $command = $this->getApplication()->find(
            'vendor:component-team:ext:page',
        );
        $input = new ArrayInput(['name' => 'Team']);
        $command->run($input, $output);

        $command = $this->getApplication()->find(
            'vendor:component-team:ext:controller',
        );
        $input = new ArrayInput(['name' => 'TeamController']);
        $command->run($input, $output);

        $command = $this->getApplication()->find(
            'vendor:component-team:ext:item',
        );
        $input = new ArrayInput(['name' => 'TeamItem']);
        $command->run($input, $output);

        $command = $this->getApplication()->find(
            'vendor:component-team:ext:role',
        );
        $input = new ArrayInput(['name' => 'TeamRole']);
        $command->run($input, $output);

        $command = $this->getApplication()->find('vendor:component-team:config');
        $input = new ArrayInput(['name' => 'component-team']);
        $command->run($input, $output);

        $command = $this->getApplication()->find('vendor:component-team:templates');
        $input = new ArrayInput([]);
        $command->run($input, $output);

        return Command::SUCCESS;
    }
}
