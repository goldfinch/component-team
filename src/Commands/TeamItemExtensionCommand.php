<?php

namespace Goldfinch\Component\Team\Commands;

use Goldfinch\Taz\Console\GeneratorCommand;
use Symfony\Component\Console\Command\Command;

#[AsCommand(name: 'vendor:component-team:ext:item')]
class TeamItemExtensionCommand extends GeneratorCommand
{
    protected static $defaultName = 'vendor:component-team:ext:item';

    protected $description = 'Create TeamItem extension';

    protected $path = '[psr4]/Extensions';

    protected $type = 'component-team item extension';

    protected $stub = './stubs/teamitem-extension.stub';

    protected $prefix = 'Extension';

    protected function execute($input, $output): int
    {
        parent::execute($input, $output);

        return Command::SUCCESS;
    }
}
