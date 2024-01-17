<?php

namespace Goldfinch\Component\Team\Pages\Nest;

use Goldfinch\Nest\Pages\Nest;
use Goldfinch\Component\Team\Controllers\Nest\TeamController;

class Team extends Nest
{
    private static $table_name = 'Team';

    private static $controller_name = TeamController::class;

    private static $icon_class = 'font-icon-block-users';
}
