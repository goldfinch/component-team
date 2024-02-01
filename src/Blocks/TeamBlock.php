<?php

namespace Goldfinch\Component\Team\Blocks;

use Goldfinch\Fielder\Fielder;
use Goldfinch\Mill\Traits\Millable;
use Goldfinch\Fielder\Traits\FielderTrait;
use DNADesign\Elemental\Models\BaseElement;
use Goldfinch\Component\Team\Models\Nest\TeamItem;
use Goldfinch\Component\Team\Models\Nest\TeamRole;

class TeamBlock extends BaseElement
{
    use FielderTrait, Millable;

    private static $table_name = 'TeamBlock';
    private static $singular_name = 'Team';
    private static $plural_name = 'Team';

    private static $db = [];

    private static $inline_editable = false;
    private static $description = '';
    private static $icon = 'font-icon-block-users';

    public function fielder(Fielder $fielder): void
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
