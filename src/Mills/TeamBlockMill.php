<?php

namespace Goldfinch\Component\Team\Mills;

use Goldfinch\Mill\Mill;

class TeamBlockMill extends Mill
{
    public function factory(): array
    {
        return [
            'Title' => $this->faker->catchPhrase(),
        ];
    }
}
