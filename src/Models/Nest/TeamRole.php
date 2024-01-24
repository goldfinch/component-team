<?php

namespace Goldfinch\Component\Team\Models\Nest;

use Goldfinch\Fielder\Fielder;
use SilverStripe\Forms\TextField;
use Goldfinch\Nest\Models\NestedObject;
use Goldfinch\Fielder\Traits\FielderTrait;
use Goldfinch\Component\Team\Models\Nest\TeamItem;

class TeamRole extends NestedObject
{
    use FielderTrait;

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

    public function fielder(Fielder $fielder): void
    {
        $fielder->require(['Title']);

        $fielder->fields([
            'Root.Main' => [$fielder->string('Title')],
        ]);
    }
}
