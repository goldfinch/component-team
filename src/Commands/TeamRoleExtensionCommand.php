<?php

namespace Goldfinch\Component\Team\Commands;

use Goldfinch\Taz\Console\GeneratorCommand;
use Symfony\Component\Console\Command\Command;

#[AsCommand(name: 'vendor:component-team:teamrole')]
class TeamRoleExtensionCommand extends GeneratorCommand
{
    protected static $defaultName = 'vendor:component-team:teamrole';

    protected $description = 'Create TeamRole extension';

    protected $path = '[psr4]/Extensions';

    protected $type = 'component-team category extension';

    protected $stub = 'teamrole-extension.stub';

    protected $prefix = 'Extension';

    protected function execute($input, $output): int
    {
        parent::execute($input, $output);

        return Command::SUCCESS;
    }
}
