<?php

namespace Goldfinch\Component\Team\Mills;

use Goldfinch\Mill\Mill;

class TeamRoleMill extends Mill
{
    public function factory(): array
    {
        return [
            'Title' => $this->faker->jobTitle(),
        ];
    }
}
