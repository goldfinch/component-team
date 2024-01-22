<?php

namespace Goldfinch\Component\Team\Pages\Nest;

use Goldfinch\Harvest\Harvest;
use Goldfinch\Nest\Pages\Nest;
use Goldfinch\Harvest\Traits\HarvestTrait;
use Goldfinch\Component\Team\Controllers\Nest\TeamController;

class Team extends Nest
{
    use HarvestTrait;

    private static $table_name = 'Team';

    private static $controller_name = TeamController::class;

    private static $icon_class = 'font-icon-block-users';

    public function harvest(Harvest $harvest): void
    {
        // ..
    }

    public function harvestSettings(Harvest $harvest): void
    {
        // ..
    }
}
