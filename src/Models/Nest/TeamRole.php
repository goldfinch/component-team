<?php

namespace Goldfinch\Component\Team\Models\Nest;

use Goldfinch\Component\Team\Models\Nest\TeamItem;
use SilverStripe\Forms\TextField;
use Goldfinch\Nest\Models\NestedObject;

class TeamRole extends NestedObject
{
    use HarvestTrait;

    public static $nest_up = null;
    public static $nest_up_children = [];
    public static $nest_down = null;
    public static $nest_down_parents = [];

    private static $table_name = 'TeamRole';
    private static $singular_name = 'role';
    private static $plural_name = 'roles';

    private static $db = [];

    private static $belongs_many_many = [
        'Items' => TeamItem::class,
    ];

    public function harvest(Harvest $harvest)
    {
        $harvest->require(['Title']);

        $harvest->fields([
            'Root.Main' => [$harvest->string('Title')],
        ]);
    }
}
