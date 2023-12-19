<?php

namespace Goldfinch\Component\Team\Models\Nest;

use SilverStripe\Assets\Image;
use SilverStripe\Forms\TextField;
use SilverStripe\Control\Director;
use SilverStripe\TagField\TagField;
use SilverStripe\Forms\TextareaField;
use Goldfinch\Nest\Models\NestedObject;
use Goldfinch\Component\Team\Admin\TeamAdmin;
use Goldfinch\Component\Team\Pages\Nest\Team;
use Goldfinch\Component\Team\Models\Nest\TeamRole;
use SilverStripe\Forms\HTMLEditor\HTMLEditorField;
use Goldfinch\FocusPointExtra\Forms\UploadFieldWithExtra;

class TeamItem extends NestedObject
{
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

    private static $owns = [
        'Image',
        'Roles',
    ];

    private static $summary_fields = [
        'Image.CMSThumbnail' => 'Image',
    ];

    // private static $has_one = [];
    // private static $belongs_to = [];
    // private static $has_many = [];
    // private static $belongs_many_many = [];
    // private static $default_sort = null;
    // private static $indexes = null;
    // private static $owns = [];
    // private static $casting = [];
    // private static $defaults = [];

    // private static $summary_fields = [];
    // private static $field_labels = [];
    // private static $searchable_fields = [];

    // private static $cascade_deletes = [];
    // private static $cascade_duplicates = [];

    // * goldfinch/helpers
    private static $field_descriptions = [];
    private static $required_fields = [
        'Title',
    ];

    public function getCMSFields()
    {
        $fields = parent::getCMSFields();

        $fields->removeByName([
            'SortOrder',
            'Roles',
        ]);

        $fields->addFieldsToTab(
            'Root.Main',
            [
                ...UploadFieldWithExtra::create('Image', 'Image', $fields, $this)->getFields(),
                ...[
                    TextField::create('Title', 'Name'),
                    TextareaField::create('Summary', 'Summary'),
                    HTMLEditorField::create('Text', 'Text'),
                    TagField::create('Roles', 'Roles', TeamRole::get())
                ],
            ]
        );

        $fields->dataFieldByName('Image')->setFolderName('team');

        return $fields;
    }

    public function getNextItem()
    {
        return TeamItem::get()->filter(['SortOrder:LessThan' => $this->SortOrder])->Sort('SortOrder DESC')->first();
    }

    public function getPreviousItem()
    {
        return TeamItem::get()->filter(['SortOrder:GreaterThan' => $this->SortOrder])->first();
    }

    public function getOtherItems()
    {
        return TeamItem::get()->filter('ID:not', $this->ID)->limit(6);
    }

    public function CMSEditLink()
    {
        $admin = new TeamAdmin;
        return Director::absoluteBaseURL() . '/' . $admin->getCMSEditLinkForManagedDataObject($this);
    }

    // public function validate()
    // {
    //     $result = parent::validate();

    //     // $result->addError('Error message');

    //     return $result;
    // }

    // public function onBeforeWrite()
    // {
    //     // ..

    //     parent::onBeforeWrite();
    // }

    // public function onBeforeDelete()
    // {
    //     // ..

    //     parent::onBeforeDelete();
    // }

    // public function canView($member = null)
    // {
    //     return Permission::check('CMS_ACCESS_Company\Website\MyAdmin', 'any', $member);
    // }

    // public function canEdit($member = null)
    // {
    //     return Permission::check('CMS_ACCESS_Company\Website\MyAdmin', 'any', $member);
    // }

    // public function canDelete($member = null)
    // {
    //     return Permission::check('CMS_ACCESS_Company\Website\MyAdmin', 'any', $member);
    // }

    // public function canCreate($member = null, $context = [])
    // {
    //     return Permission::check('CMS_ACCESS_Company\Website\MyAdmin', 'any', $member);
    // }
}
