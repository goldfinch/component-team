<?php

namespace Goldfinch\Component\Team\Commands;

use Goldfinch\Taz\Console\GeneratorCommand;
use Symfony\Component\Console\Command\Command;

#[AsCommand(name: 'vendor:vendor:component-team:teamitem')]
class TeamItemExtensionCommand extends GeneratorCommand
{
    protected static $defaultName = 'vendor:vendor:component-team:teamitem';

    protected $description = 'Create TeamItem extension';

    protected $path = '[psr4]/Extensions';

    protected $type = 'component-team item extension';

    protected $stub = 'teamitem-extension.stub';

    protected $prefix = 'Extension';

    protected function execute($input, $output): int
    {
        parent::execute($input, $output);

        return Command::SUCCESS;
    }
}
