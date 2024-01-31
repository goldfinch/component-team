<?php

namespace Goldfinch\Component\Team\Pages\Nest;

use Goldfinch\Fielder\Fielder;
use Goldfinch\Nest\Pages\Nest;
use Goldfinch\Mill\Traits\Millable;
use Goldfinch\Fielder\Traits\FielderTrait;
use Goldfinch\Component\Team\Models\Nest\TeamItem;
use Goldfinch\Component\Team\Models\Nest\TeamRole;
use Goldfinch\Component\Team\Pages\Nest\TeamByRole;
use Goldfinch\Component\Team\Controllers\Nest\TeamController;

class Team extends Nest
{
    use FielderTrait, Millable;

    private static $table_name = 'Team';

    private static $controller_name = TeamController::class;

    private static $allowed_children = [TeamByRole::class];

    private static $icon_class = 'font-icon-block-users';

    private static $defaults = [
        'NestedObject' => TeamItem::class,
    ];

    public function fielder(Fielder $fielder): void
    {
        // ..
    }

    public function fielderSettings(Fielder $fielder): void
    {
        $fielder->disable(['NestedObject', 'NestedPseudo']);
    }

    protected function onBeforeWrite()
    {
        parent::onBeforeWrite();

        $this->NestedObject = TeamItem::class;
        $this->NestedPseudo = 0;
    }

    public function Roles()
    {
        return TeamRole::get();
    }
}
