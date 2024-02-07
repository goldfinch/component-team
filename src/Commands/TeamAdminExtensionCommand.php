<?php

namespace Goldfinch\Component\Team\Commands;

use Goldfinch\Taz\Console\GeneratorCommand;

#[AsCommand(name: 'vendor:component-team:ext:admin')]
class TeamAdminExtensionCommand extends GeneratorCommand
{
    protected static $defaultName = 'vendor:component-team:ext:admin';

    protected $description = 'Create TeamAdmin extension';

    protected $path = '[psr4]/Extensions';

    protected $type = 'extension';

    protected $stub = './stubs/teamadmin-extension.stub';

    protected $prefix = 'Extension';
}
