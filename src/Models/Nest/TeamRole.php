<?php

namespace Goldfinch\Component\Team\Models\Nest;

use Goldfinch\Mill\Traits\Millable;
use SilverStripe\ORM\PaginatedList;
use SilverStripe\Control\Controller;
use Goldfinch\Nest\Models\NestedObject;
use Goldfinch\Component\Team\Configs\TeamConfig;
use Goldfinch\Component\Team\Pages\Nest\TeamByRole;

class TeamRole extends NestedObject
{
    use Millable;

    public static $nest_up = null;
    public static $nest_up_children = [];
    public static $nest_down = TeamByRole::class;
    public static $nest_down_parents = [];

    private static $table_name = 'TeamRole';
    private static $singular_name = 'role';
    private static $plural_name = 'roles';

    private static $db = [];

    private static $belongs_many_many = [
        'Items' => TeamItem::class,
    ];

    private static $summary_fields = [
        'Items.Count' => 'Members',
    ];

    public function getCMSFields()
    {
        $fields = parent::getCMSFields();

        $fielder = $this->intFielder($fields)->getFielder();

        $fielder->required(['Title']);

        $fielder->fields([
            'Root.Main' => [$fielder->string('Title')],
        ]);

        return $fields;
    }

    public function List()
    {
        if (Controller::has_curr()) {
            $ctrl = Controller::curr();

            $cfg = TeamConfig::current_config();

            return PaginatedList::create($this->Items(), $ctrl->getRequest())->setPageLength($cfg->ItemsPerPage ?? 10);
        }
    }

    public function OtherRoles($type = 'mix', $limit = 6, $escapeEmpty = true)
    {
        $filter = ['ID:not' => $this->ID];

        if ($escapeEmpty) {
            $filter['Items.Count():GreaterThan'] = 0;
        }

        return TeamRole::get()->filter($filter)->shuffle()->limit($limit);
    }
}
