<?php

namespace Goldfinch\Component\Team\Models\Nest;

use Goldfinch\Fielder\Fielder;
use SilverStripe\Assets\Image;
use SilverStripe\Control\Director;
use Goldfinch\Nest\Models\NestedObject;
use Goldfinch\Fielder\Traits\FielderTrait;
use Goldfinch\Component\Team\Admin\TeamAdmin;
use Goldfinch\Component\Team\Pages\Nest\Team;
use Goldfinch\Component\Team\Configs\TeamConfig;

class TeamItem extends NestedObject
{
    use FielderTrait;

    public static $nest_up = null;
    public static $nest_up_children = [];
    public static $nest_down = Team::class;
    public static $nest_down_parents = [];

    private static $table_name = 'TeamItem';
    private static $singular_name = 'member';
    private static $plural_name = 'members';

    private static $db = [
        'Summary' => 'Text',
        'Text' => 'HTMLText',
    ];

    private static $many_many = [
        'Roles' => TeamRole::class,
    ];

    private static $many_many_extraFields = [
        'Roles' => [
            'SortExtra' => 'Int',
        ],
    ];

    private static $has_one = [
        'Image' => Image::class,
    ];

    private static $owns = ['Image', 'Roles'];

    private static $summary_fields = [
        'Image.CMSThumbnail' => 'Image',
    ];

    public function fielder(Fielder $fielder): void
    {
        $fielder->require(['Title']);

        $fielder->remove(['SortOrder', 'Roles']);

        $fielder->fields([
            'Root.Main' => [
                $fielder->string('Title', 'Name'),
                ...$fielder->media('Image'),
                $fielder->tag('Roles'),
                $fielder->text('Summary'),
                $fielder->html('Text'),
            ],
        ]);

        $fielder->dataField('Image')->setFolderName('team');

        $cfg = TeamConfig::current_config();

        if ($cfg->DisabledRoles) {
            $fielder->remove('Roles');
        }
    }

    public function getNextItem()
    {
        return TeamItem::get()
            ->filter(['SortOrder:LessThan' => $this->SortOrder])
            ->Sort('SortOrder DESC')
            ->first();
    }

    public function getPreviousItem()
    {
        return TeamItem::get()
            ->filter(['SortOrder:GreaterThan' => $this->SortOrder])
            ->first();
    }

    public function getOtherItems()
    {
        return TeamItem::get()
            ->filter('ID:not', $this->ID)
            ->limit(6);
    }

    public function CMSEditLink()
    {
        $admin = new TeamAdmin();
        return Director::absoluteBaseURL() .
            '/' .
            $admin->getCMSEditLinkForManagedDataObject($this);
    }
}
