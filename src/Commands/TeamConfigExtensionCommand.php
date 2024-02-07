<?php

namespace Goldfinch\Component\Team\Commands;

use Goldfinch\Taz\Console\GeneratorCommand;

#[AsCommand(name: 'vendor:component-team:ext:config')]
class TeamConfigExtensionCommand extends GeneratorCommand
{
    protected static $defaultName = 'vendor:component-team:ext:config';

    protected $description = 'Create TeamConfig extension';

    protected $path = '[psr4]/Extensions';

    protected $type = 'extension';

    protected $stub = './stubs/teamconfig-extension.stub';

    protected $prefix = 'Extension';
}
