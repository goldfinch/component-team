<?php

namespace Goldfinch\Component\Team\Commands;

use Goldfinch\Taz\Console\GeneratorCommand;
use Symfony\Component\Console\Command\Command;

#[AsCommand(name: 'vendor:component-team:ext:block')]
class TeamBlockExtensionCommand extends GeneratorCommand
{
    protected static $defaultName = 'vendor:component-team:ext:block';

    protected $description = 'Create TeamBlock extension';

    protected $path = '[psr4]/Extensions';

    protected $type = 'component-team block extension';

    protected $stub = './stubs/teamblock-extension.stub';

    protected $prefix = 'Extension';

    protected function execute($input, $output): int
    {
        parent::execute($input, $output);

        return Command::SUCCESS;
    }
}
