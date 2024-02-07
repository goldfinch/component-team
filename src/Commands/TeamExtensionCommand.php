<?php

namespace Goldfinch\Component\Team\Commands;

use Goldfinch\Taz\Console\GeneratorCommand;

#[AsCommand(name: 'vendor:component-team:ext:page')]
class TeamExtensionCommand extends GeneratorCommand
{
    protected static $defaultName = 'vendor:component-team:ext:page';

    protected $description = 'Create Team page extension';

    protected $path = '[psr4]/Extensions';

    protected $type = 'extension';

    protected $stub = './stubs/team-extension.stub';

    protected $suffix = 'Extension';
}
