<?php

namespace Goldfinch\Component\Team\Commands;

use Goldfinch\Taz\Console\GeneratorCommand;
use Symfony\Component\Console\Command\Command;

#[AsCommand(name: 'vendor:component-team:teamconfig')]
class TeamConfigExtensionCommand extends GeneratorCommand
{
    protected static $defaultName = 'vendor:component-team:teamconfig';

    protected $description = 'Create TeamConfig extension';

    protected $path = '[psr4]/Extensions';

    protected $type = 'component-team config extension';

    protected $stub = 'teamconfig-extension.stub';

    protected $prefix = 'Extension';

    protected function execute($input, $output): int
    {
        parent::execute($input, $output);

        return Command::SUCCESS;
    }
}
