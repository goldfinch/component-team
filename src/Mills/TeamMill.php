<?php

namespace Goldfinch\Component\Team\Mills;

use Goldfinch\Mill\Mill;

class TeamMill extends Mill
{
    public function factory(): array
    {
        return [
            'Title' => $this->faker->sentence(3),
            'Content' => $this->faker->paragraph(20),
        ];
    }
}
