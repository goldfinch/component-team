<?php

namespace Goldfinch\Component\Team\Commands;

use Goldfinch\Taz\Console\GeneratorCommand;

#[AsCommand(name: 'vendor:component-team:ext:controller')]
class TeamControllerExtensionCommand extends GeneratorCommand
{
    protected static $defaultName = 'vendor:component-team:ext:controller';

    protected $description = 'Create TeamController extension';

    protected $path = '[psr4]/Extensions';

    protected $type = 'extension';

    protected $stub = './stubs/teamcontroller-extension.stub';

    protected $suffix = 'Extension';
}
