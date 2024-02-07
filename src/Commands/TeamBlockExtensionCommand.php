<?php

namespace Goldfinch\Component\Team\Commands;

use Goldfinch\Taz\Console\GeneratorCommand;

#[AsCommand(name: 'vendor:component-team:ext:block')]
class TeamBlockExtensionCommand extends GeneratorCommand
{
    protected static $defaultName = 'vendor:component-team:ext:block';

    protected $description = 'Create TeamBlock extension';

    protected $path = '[psr4]/Extensions';

    protected $type = 'extension';

    protected $stub = './stubs/teamblock-extension.stub';

    protected $suffix = 'Extension';
}
