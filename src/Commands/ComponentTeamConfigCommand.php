<?php

namespace Goldfinch\Component\Team\Commands;

use Goldfinch\Taz\Console\GeneratorCommand;
use Symfony\Component\Console\Command\Command;

#[AsCommand(name: 'config:component-team')]
class ComponentTeamConfigCommand extends GeneratorCommand
{
    protected static $defaultName = 'config:component-team';

    protected $description = 'Create component-team config';

    protected $path = 'app/_config';

    protected $type = 'component-team yml config';

    protected $stub = 'teamconfig.stub';

    protected $extension = '.yml';

    protected function execute($input, $output): int
    {
        parent::execute($input, $output);

        return Command::SUCCESS;
    }
}
