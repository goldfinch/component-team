<?php

namespace Goldfinch\Component\Team\Controllers\Nest;

use Goldfinch\Nest\Controllers\NestController;
use Goldfinch\Component\Team\Configs\TeamConfig;

class TeamController extends NestController
{
    public function NestedList()
    {
        if ($this->NestedObject) {
            $cfg = $this->NestedObject::config();
            $cfgDB = TeamConfig::current_config();
            if ($cfgDB->ItemsPerPage) {
                $cfg->set('nestedListPageLength', $cfgDB->ItemsPerPage);
            }
        }

        return parent::NestedList();
    }
}
