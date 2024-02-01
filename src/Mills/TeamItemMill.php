<?php

namespace Goldfinch\Component\Team\Mills;

use Goldfinch\Mill\Mill;

class TeamItemMill extends Mill
{
    public function factory(): array
    {
        $gender = rand(1,1) > 5 ? 'male' : 'female';

        return [
            'Title' => $this->faker->catchPhrase(),
            'FirstName' => $this->faker->firstName($gender),
            'LastName' => $this->faker->lastName($gender),
            // 'Phone' => $this->faker->e164PhoneNumber(),
            // 'Email' => $this->faker->email(),
            // 'Summary' => $this->faker->paragraph(2),
            'About' => $this->faker->paragraph(5),
        ];
    }
}
