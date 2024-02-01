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
        'ItemsPerPage' => 'Int(10)',
        'DisabledRoles' => 'Boolean',
    ];

    public function fielder(Fielder $fielder): void
    {
        $fielder->fields([
            'Root.Main' => [
                $fielder->string('ItemsPerPage', 'Items per page')->setDescription('used in paginated/loadable list'),
                $fielder->checkbox('DisabledRoles', 'Disabled roles'),
            ],
        ]);

        $fielder->validate(['ItemsPerPage' => function($value, $fail) {
            $value = (int) $value;
            $min = 1;
            $max = 100;
            if (!$value || $value < $min || $value > $max) {
                $fail('The :attribute must be between '.$min.' and '.$max.'.');
            }
        }]);
    }
}
