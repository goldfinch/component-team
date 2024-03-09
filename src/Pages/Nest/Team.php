<?php

namespace Goldfinch\Component\Team\Pages\Nest;

use Goldfinch\Nest\Pages\Nest;
use Goldfinch\Mill\Traits\Millable;
use Goldfinch\Component\Team\Models\Nest\TeamItem;
use Goldfinch\Component\Team\Models\Nest\TeamRole;
use Goldfinch\Component\Team\Pages\Nest\TeamByRole;
use Goldfinch\Component\Team\Controllers\Nest\TeamController;

class Team extends Nest
{
    use Millable;

    private static $table_name = 'Team';

    private static $controller_name = TeamController::class;

    private static $allowed_children = [TeamByRole::class];

    private static $icon_class = 'font-icon-block-users';

    private static $defaults = [
        'NestedObject' => TeamItem::class,
    ];

    public function getCMSFields()
    {
        $fields = parent::getCMSFields()->initFielder($this);

        $fielder = $fields->getFielder();

        // ..

        return $fields;
    }

    public function getSettingsFields()
    {
        $fields = parent::getSettingsFields()->initFielder($this);

        $fielder = $fields->getFielder();

        $fielder->disable(['NestedObject', 'NestedPseudo']);

        return $fields;
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
