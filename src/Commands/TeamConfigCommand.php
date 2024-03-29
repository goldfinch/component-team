<?php

namespace Goldfinch\Component\Team\Commands;

use Goldfinch\Taz\Console\GeneratorCommand;

#[AsCommand(name: 'vendor:component-team:config')]
class TeamConfigCommand extends GeneratorCommand
{
    protected static $defaultName = 'vendor:component-team:config';

    protected $description = 'Create Team YML config';

    protected $path = 'app/_config';

    protected $type = 'config';

    protected $stub = './stubs/config.stub';

    protected $extension = '.yml';
}
