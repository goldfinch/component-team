<?php

namespace Goldfinch\Component\Team\Commands;

use Goldfinch\Taz\Console\GeneratorCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\ArrayInput;

#[AsCommand(name: 'vendor:component-team')]
class ComponentTeamCommand extends GeneratorCommand
{
    protected static $defaultName = 'vendor:component-team';

    protected $description = 'Populate goldfinch/component-team components';

    protected function execute($input, $output): int
    {
        $command = $this->getApplication()->find(
            'vendor:component-team-teamitem',
        );
        $input = new ArrayInput(['name' => 'TeamItem']);
        $command->run($input, $output);

        $command = $this->getApplication()->find(
            'vendor:component-team-teamrole',
        );
        $input = new ArrayInput(['name' => 'TeamRole']);
        $command->run($input, $output);

        $command = $this->getApplication()->find(
            'vendor:component-team-teamconfig',
        );
        $input = new ArrayInput(['name' => 'TeamConfig']);
        $command->run($input, $output);

        $command = $this->getApplication()->find(
            'vendor:component-team-teamblock',
        );
        $input = new ArrayInput(['name' => 'TeamBlock']);
        $command->run($input, $output);

        $command = $this->getApplication()->find(
            'templates:component-team',
        );
        $input = new ArrayInput([]);
        $command->run($input, $output);

        $command = $this->getApplication()->find('config:component-team');
        $input = new ArrayInput(['name' => 'component-team']);
        $command->run($input, $output);

        return Command::SUCCESS;
    }
}
