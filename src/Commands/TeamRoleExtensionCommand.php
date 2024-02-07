<?php

namespace Goldfinch\Component\Team\Commands;

use Goldfinch\Taz\Console\GeneratorCommand;

#[AsCommand(name: 'vendor:component-team:ext:role')]
class TeamRoleExtensionCommand extends GeneratorCommand
{
    protected static $defaultName = 'vendor:component-team:ext:role';

    protected $description = 'Create TeamRole extension';

    protected $path = '[psr4]/Extensions';

    protected $type = 'extension';

    protected $stub = './stubs/teamrole-extension.stub';

    protected $suffix = 'Extension';
}
