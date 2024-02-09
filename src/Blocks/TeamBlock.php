<?php

namespace Goldfinch\Component\Team\Blocks;

use DNADesign\Elemental\Models\BaseElement;
use Goldfinch\Component\Team\Models\Nest\TeamItem;
use Goldfinch\Component\Team\Models\Nest\TeamRole;

class TeamBlock extends BaseElement
{
    private static $table_name = 'TeamBlock';
    private static $singular_name = 'Team';
    private static $plural_name = 'Team';

    private static $db = [];

    private static $inline_editable = false;
    private static $description = 'Team block handler';
    private static $icon = 'font-icon-block-users';

    public function Items()
    {
        return TeamItem::get();
    }

    public function Roles()
    {
        return TeamRole::get();
    }
}
