<?php

namespace Goldfinch\Component\Team\Pages\Nest;

use Goldfinch\Component\Team\Controllers\Nest\TeamController;
use Goldfinch\Nest\Pages\Nest;

class Team extends Nest
{
    private static $table_name = 'Team';
    private static $controller_name = TeamController::class;

    private static $icon_class = 'bi-person-badge-fill';
}
