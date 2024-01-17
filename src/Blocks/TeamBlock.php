<?php

namespace Goldfinch\Component\Team\Blocks;

use Goldfinch\Harvest\Harvest;
use Goldfinch\Harvest\Traits\HarvestTrait;
use DNADesign\Elemental\Models\BaseElement;
use Goldfinch\Component\Team\Models\Nest\TeamItem;
use Goldfinch\Component\Team\Models\Nest\TeamRole;

class TeamBlock extends BaseElement
{
    use HarvestTrait;

    private static $table_name = 'TeamBlock';
    private static $singular_name = 'Members';
    private static $plural_name = 'Members';

    private static $db = [
        // 'BlockTitle' => 'Varchar',
        // 'BlockSubTitle' => 'Varchar',
        // 'BlockText' => 'HTMLText',
    ];

    private static $inline_editable = false;
    private static $description = '';
    private static $icon = 'font-icon-block-users';

    public function harvest(Harvest $harvest)
    {
        // ..
    }

    public function Items()
    {
        return TeamItem::get();
    }

    public function Roles()
    {
        return TeamRole::get();
    }

    public function getSummary()
    {
        return $this->getDescription();
    }

    public function getType()
    {
        $default = $this->i18n_singular_name() ?: 'Block';

        return _t(__CLASS__ . '.BlockType', $default);
    }
}
