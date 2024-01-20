<?php

namespace Goldfinch\Component\Team\Configs;

use Goldfinch\Harvest\Harvest;
use JonoM\SomeConfig\SomeConfig;
use SilverStripe\ORM\DataObject;
use Goldfinch\Harvest\Traits\HarvestTrait;
use SilverStripe\View\TemplateGlobalProvider;

class TeamConfig extends DataObject implements TemplateGlobalProvider
{
    use SomeConfig, HarvestTrait;

    private static $table_name = 'TeamConfig';

    private static $db = [
        'DisabledRoles' => 'Boolean',
    ];

    public function harvest(Harvest $harvest): void
    {
        $harvest->fields([
            'Root.Main' => [
                $harvest->checkbox('DisabledRoles', 'Disabled roles'),
            ],
        ]);
    }
}
