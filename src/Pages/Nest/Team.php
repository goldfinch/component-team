<?php

namespace Goldfinch\Component\Team\Pages\Nest;

use Goldfinch\Fielder\Fielder;
use Goldfinch\Nest\Pages\Nest;
use Goldfinch\Fielder\Traits\FielderTrait;
use Goldfinch\Component\Team\Controllers\Nest\TeamController;

class Team extends Nest
{
    use FielderTrait;

    private static $table_name = 'Team';

    private static $controller_name = TeamController::class;

    private static $icon_class = 'font-icon-block-users';

    public function fielder(Fielder $fielder): void
    {
        // ..
    }

    public function fielderSettings(Fielder $fielder): void
    {
        // ..
    }
}
