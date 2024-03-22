<?php

namespace Goldfinch\Component\Team\Pages\Nest;

use Goldfinch\Nest\Pages\Nest;
use Goldfinch\Mill\Traits\Millable;
use Goldfinch\Component\Team\Models\Nest\TeamRole;
use Goldfinch\Component\Team\Controllers\Nest\TeamByRoleController;

class TeamByRole extends Nest
{
    use Millable;

    private static $table_name = 'TeamByRole';

    private static $controller_name = TeamByRoleController::class;

    private static $allowed_children = [];

    private static $icon_class = 'font-icon-block-users';

    private static $can_be_root = false;

    private static $description = 'Nested pseudo page, to display individual roles. Can only be added within Team page as a child page';

    public function getCMSFields()
    {
        $fields = parent::getCMSFields()->initFielder($this);

        $fielder = $fields->getFielder();

        $fielder->remove([
            'Content',
            'MenuTitle',
        ]);

        $fielder->description('Title', 'Does not show up anywhere except SiteTree in the CMS');

        $this->extend('updateCMSFields', $fields);

        return $fields;
    }

    public function getSettingsFields()
    {
        $fields = parent::getSettingsFields()->initFielder($this);

        $fielder = $fields->getFielder();

        if ($this->NestedPseudo) {
            $fielder->removeFieldsInTab('Root.Search');
            $fielder->removeFieldsInTab('Root.General');
            $fielder->removeFieldsInTab('Root.SEO');
        }

        $fielder->disable(['NestedObject']); // NestedPseudo

        $this->extend('updateSettingsFields', $fields);

        return $fields;
    }

    protected function onBeforeWrite()
    {
        parent::onBeforeWrite();

        $this->NestedObject = TeamRole::class;
        // $this->NestedPseudo = 1;
        $this->ShowInMenus = 0;
        $this->ShowInSearch = 0;
    }
}
