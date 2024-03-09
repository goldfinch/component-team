<?php

namespace Goldfinch\Component\Team\Models\Nest;

use SilverStripe\Assets\Image;
use SilverStripe\ORM\DataList;
use SilverStripe\Control\Director;
use Goldfinch\Mill\Traits\Millable;
use SilverStripe\Control\HTTPRequest;
use Goldfinch\Nest\Models\NestedObject;
use Goldfinch\Component\Team\Admin\TeamAdmin;
use Goldfinch\Component\Team\Pages\Nest\Team;
use Goldfinch\Component\Team\Configs\TeamConfig;
use Goldfinch\Component\Team\Models\Nest\TeamItem;
use Goldfinch\Component\Team\Models\Nest\TeamRole;

class TeamItem extends NestedObject
{
    use Millable;

    public static $nest_up = null;
    public static $nest_up_children = [];
    public static $nest_down = Team::class;
    public static $nest_down_parents = [];

    private static $table_name = 'TeamItem';
    private static $singular_name = 'team';
    private static $plural_name = 'team';

    private static $db = [
        'FirstName' => 'Varchar(64)',
        'LastName' => 'Varchar(64)',
        // 'Phone' => 'Varchar(64)',
        // 'Email' => 'Varchar(64)',
        // 'Summary' => 'Text',
        'About' => 'HTMLText',
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
        'Roles.Count' => 'Roles',
    ];

    private static $required_title = false;

    private static $searchable_list_fields = [
        'Title', 'FirstName', 'LastName', 'About',
    ];

    public function GridItemSummaryList()
    {
        $list = parent::GridItemSummaryList();

        $list['Image'] = $this->Image()->CMSThumbnail();

        return $list;
    }

    public function summaryFields()
    {
        $fields = parent::summaryFields();

        $cfg = TeamConfig::current_config();

        if ($cfg->DisabledRoles) {
            unset($fields['Roles.Count']);
        }

        return $fields;
    }

    public function getCMSFields()
    {
        $fields = parent::getCMSFields()->initFielder($this);

        $fielder = $fields->getFielder();

        $fielder->required(['FirstName', 'LastName']);

        $fielder->remove(['Title']);

        $fielder->fields([
            'Root.Main' => [
                // $fielder->string('Title'),
                $fielder->string('FirstName'),
                $fielder->string('LastName'),
                // $fielder->phone('Phone'),
                // $fielder->email('Email'),
                // $fielder->textarea('Summary'),
                $fielder->html('Content'),
                $fielder->tag('Roles'),
                ...$fielder->media('Image'),
            ],
        ]);

        $fielder->dataField('Image')->setFolderName('team');

        $cfg = TeamConfig::current_config();

        if ($cfg->DisabledRoles) {
            $fielder->remove('Roles');
        }

        return $fields;
    }

    protected function onBeforeWrite()
    {
        parent::onBeforeWrite();

        $this->Title = $this->FirstName . ' ' . $this->LastName;
    }

    // type : mix | inside | outside
    public function OtherItems($type = 'mix', $limit = 6)
    {
        $model = TeamItem::get()->filter(['ID:not' => $this->ID])->shuffle();

        if ($type == 'mix') {
            //
        } else if ($type == 'inside') {
            $roles = $this->Roles()->column('ID');

            if (count($roles)) {
                $model = $model->filterAny('Roles.ID', $roles);
            }
        } else if ($type == 'outside') {
            $roles = $this->Roles()->column('ID');

            if (count($roles)) {
                $model = $model->filterAny('Roles.ID:not', $roles);
            }
        }

        return $model->limit($limit);
    }

    public function CMSEditLink()
    {
        $admin = new TeamAdmin();
        return Director::absoluteBaseURL() .
            '/' .
            $admin->getCMSEditLinkForManagedDataObject($this);
    }

    /**
     * Extend nested listExtraFilter by adding additional filter option (role)
     */
    public static function listExtraFilter(DataList $list, HTTPRequest $request): DataList
    {
        $list = parent::listExtraFilter($list, $request);

        if ($request->getVar('role'))
        {
            $list = $list->filter([
                'Roles.URLSegment' => $request->getVar('role'),
            ]);
        }

        return $list;
    }

    /**
     * Extend nested loadable by adding additional filter option (role)
     */
    public static function loadable(DataList $list, HTTPRequest $request, $data, $config): DataList
    {
        $list = parent::loadable($list, $request, $data, $config);

        if ($data && !empty($data))
        {
            if (isset($data['urlparams']['role']) && $data['urlparams']['role']) {

                $list = $list->filter([
                    'Roles.URLSegment' => $data['urlparams']['role'],
                ]);
            }
        }

        return $list;
    }
}
