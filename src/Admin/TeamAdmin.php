<?php

namespace Goldfinch\Component\Team\Admin;

use Goldfinch\Component\Team\Models\Nest\TeamItem;
use Goldfinch\Component\Team\Blocks\TeamBlock;
use Goldfinch\Component\Team\Configs\TeamConfig;
use Goldfinch\Component\Team\Models\Nest\TeamRole;
use SilverStripe\Admin\ModelAdmin;
use JonoM\SomeConfig\SomeConfigAdmin;
use SilverStripe\Forms\GridField\GridFieldConfig;

class TeamAdmin extends ModelAdmin
{
    use SomeConfigAdmin;

    private static $url_segment = 'team';
    private static $menu_title = 'Team';
    private static $menu_icon_class = 'font-icon-block-users';
    // private static $menu_priority = -0.5;

    private static $managed_models = [
        TeamItem::class => [
            'title'=> 'Members',
        ],
        TeamRole::class => [
            'title'=> 'Roles',
        ],
        TeamBlock::class => [
            'title'=> 'Blocks',
        ],
        TeamConfig::class => [
            'title'=> 'Settings',
        ],
    ];

    // public $showImportForm = true;
    // public $showSearchForm = true;
    // private static $page_length = 30;

    public function getList()
    {
        $list = parent::getList();

        // ..

        return $list;
    }

    protected function getGridFieldConfig(): GridFieldConfig
    {
        $config = parent::getGridFieldConfig();

        // ..

        return $config;
    }

    public function getSearchContext()
    {
        $context = parent::getSearchContext();

        // ..

        return $context;
    }

    public function getEditForm($id = null, $fields = null)
    {
        $form = parent::getEditForm($id, $fields);

        // ..

        return $form;
    }

    // public function getExportFields()
    // {
    //     return [
    //         // 'Name' => 'Name',
    //         // 'Category.Title' => 'Category'
    //     ];
    // }
}
