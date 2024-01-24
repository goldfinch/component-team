<?php

namespace Goldfinch\Component\Team\Configs;

use Goldfinch\Fielder\Fielder;
use JonoM\SomeConfig\SomeConfig;
use SilverStripe\ORM\DataObject;
use Goldfinch\Fielder\Traits\FielderTrait;
use SilverStripe\View\TemplateGlobalProvider;

class TeamConfig extends DataObject implements TemplateGlobalProvider
{
    use SomeConfig, FielderTrait;

    private static $table_name = 'TeamConfig';

    private static $db = [
        'DisabledRoles' => 'Boolean',
    ];

    public function fielder(Fielder $fielder): void
    {
        $fielder->fields([
            'Root.Main' => [
                $fielder->checkbox('DisabledRoles', 'Disabled roles'),
            ],
        ]);
    }
}
