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
        $command = $this->getApplication()->find('vendor:component-team:ext:admin');
        $command->run(new ArrayInput(['name' => 'TeamAdmin']), $output);

        $command = $this->getApplication()->find('vendor:component-team:ext:config');
        $command->run(new ArrayInput(['name' => 'TeamConfig']), $output);

        $command = $this->getApplication()->find('vendor:component-team:ext:block');
        $command->run(new ArrayInput(['name' => 'TeamBlock']), $output);

        $command = $this->getApplication()->find('vendor:component-team:ext:page');
        $command->run(new ArrayInput(['name' => 'Team']), $output);

        $command = $this->getApplication()->find('vendor:component-team:ext:controller');
        $command->run(new ArrayInput(['name' => 'TeamController']), $output);

        $command = $this->getApplication()->find('vendor:component-team:ext:item');
        $command->run(new ArrayInput(['name' => 'TeamItem']), $output);

        $command = $this->getApplication()->find('vendor:component-team:ext:role');
        $command->run(new ArrayInput(['name' => 'TeamRole']), $output);

        $command = $this->getApplication()->find('vendor:component-team:config');
        $command->run(new ArrayInput(['name' => 'component-team']), $output);

        $command = $this->getApplication()->find('vendor:component-team:templates');
        $command->run(new ArrayInput([]), $output);

        return Command::SUCCESS;
    }
}
