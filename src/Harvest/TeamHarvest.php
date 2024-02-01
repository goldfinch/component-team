<?php

namespace Goldfinch\Component\Team\Harvest;

use Goldfinch\Harvest\Harvest;
use Goldfinch\Blocks\Pages\Blocks;
use Goldfinch\Component\Team\Pages\Nest\Team;
use Goldfinch\Component\Team\Blocks\TeamBlock;
use Goldfinch\Component\Team\Models\Nest\TeamItem;
use Goldfinch\Component\Team\Models\Nest\TeamRole;
use Goldfinch\Component\Team\Pages\Nest\TeamByRole;

class TeamHarvest extends Harvest
{
    public static function run(): void
    {
        $teamPage = Team::mill(1)->make([
            'Title' => 'Team',
            'Content' => '',
        ])->first();

        TeamByRole::mill(1)->make([
            'Title' => 'Team by role',
            'Content' => '',
            'ParentID' => $teamPage->ID,
        ]);

        TeamRole::mill(5)->make();

        TeamItem::mill(30)->make()->each(function($item) {
            $roles = TeamRole::get()->shuffle()->limit(rand(0,4));

            foreach ($roles as $role) {
                $item->Roles()->add($role);
            }
        });

        // add one block to Blocks demo page (if it's exists)
        if (class_exists(Blocks::class)) {
            $demoBlocks = Blocks::get()->filter('Title', 'Blocks')->first();

            if ($demoBlocks && $demoBlocks->exists() && $demoBlocks->ElementalArea()->exists()) {
                TeamBlock::mill(1)->make([
                    'ClassName' => $demoBlocks->ClassName,
                    'TopPageID' => $demoBlocks->ID,
                    'ParentID' => $demoBlocks->ElementalArea()->ID,
                    'Title' => 'Team',
                ]);
            }
        }
    }
}
