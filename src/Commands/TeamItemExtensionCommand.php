<?php

namespace Goldfinch\Component\Team\Commands;

use Goldfinch\Taz\Console\GeneratorCommand;

#[AsCommand(name: 'vendor:component-team:ext:item')]
class TeamItemExtensionCommand extends GeneratorCommand
{
    protected static $defaultName = 'vendor:component-team:ext:item';

    protected $description = 'Create TeamItem extension';

    protected $path = '[psr4]/Extensions';

    protected $type = 'extension';

    protected $stub = './stubs/teamitem-extension.stub';

    protected $prefix = 'Extension';
}
