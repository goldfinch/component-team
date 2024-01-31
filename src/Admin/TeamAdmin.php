<?php

namespace Goldfinch\Component\Team\Admin;

use SilverStripe\Admin\ModelAdmin;
use JonoM\SomeConfig\SomeConfigAdmin;
use Goldfinch\Component\Team\Blocks\TeamBlock;
use Goldfinch\Component\Team\Configs\TeamConfig;
use Goldfinch\Component\Team\Models\Nest\TeamItem;
use Goldfinch\Component\Team\Models\Nest\TeamRole;

class TeamAdmin extends ModelAdmin
{
    use SomeConfigAdmin;

    private static $url_segment = 'team';
    private static $menu_title = 'Team';
    private static $menu_icon_class = 'font-icon-block-users';
    // private static $menu_priority = -0.5;

    private static $managed_models = [
        TeamItem::class => [
            'title' => 'Members',
        ],
        TeamRole::class => [
            'title' => 'Roles',
        ],
        TeamBlock::class => [
            'title' => 'Blocks',
        ],
        TeamConfig::class => [
            'title' => 'Settings',
        ],
    ];

    public function getManagedModels()
    {
        $models = parent::getManagedModels();

        $cfg = TeamConfig::current_config();

        if ($cfg->DisabledRoles) {
            unset($models[TeamRole::class]);
        }

        if (!class_exists('DNADesign\Elemental\Models\BaseElement')) {
            unset($models[TeamBlock::class]);
        }

        if (empty($cfg->config('db')->db)) {
            unset($models[TeamConfig::class]);
        }

        return $models;
    }
}
