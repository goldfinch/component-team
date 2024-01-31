<?php

namespace Goldfinch\Component\Team\Commands;

use Goldfinch\Taz\Services\Templater;
use Goldfinch\Taz\Console\GeneratorCommand;

#[AsCommand(name: 'vendor:component-team:templates')]
class TeamTemplatesCommand extends GeneratorCommand
{
    protected static $defaultName = 'vendor:component-team:templates';

    protected $description = 'Publish [goldfinch/component-team] templates';

    protected $no_arguments = true;

    protected function execute($input, $output): int
    {
        $templater = Templater::create($input, $output, $this, 'goldfinch/component-team');

        $theme = $templater->defineTheme();

        if (is_string($theme)) {

            $componentPathTemplates = BASE_PATH . '/vendor/goldfinch/component-team/templates/';
            $componentPath = $componentPathTemplates . 'Goldfinch/Component/Team/';
            $themeTemplates = 'themes/' . $theme . '/templates/';
            $themePath = $themeTemplates . 'Goldfinch/Component/Team/';

            $files = [
                [
                    'from' => $componentPath . 'Blocks/TeamBlock.ss',
                    'to' => $themePath . 'Blocks/TeamBlock.ss',
                ],
                [
                    'from' => $componentPath . 'Models/Nest/TeamItem.ss',
                    'to' => $themePath . 'Models/Nest/TeamItem.ss',
                ],
                [
                    'from' => $componentPath . 'Models/Nest/TeamRole.ss',
                    'to' => $themePath . 'Models/Nest/TeamRole.ss',
                ],
                [
                    'from' => $componentPath . 'Pages/Nest/Team.ss',
                    'to' => $themePath . 'Pages/Nest/Team.ss',
                ],
                [
                    'from' => $componentPath . 'Pages/Nest/TeamByRole.ss',
                    'to' => $themePath . 'Pages/Nest/TeamByRole.ss',
                ],
                [
                    'from' => $componentPath . 'Partials/TeamFilter.ss',
                    'to' => $themePath . 'Partials/TeamFilter.ss',
                ],
                [
                    'from' => $componentPathTemplates . 'Loadable/Goldfinch/Component/Team/Models/Nest/TeamRole.ss',
                    'to' => $themeTemplates . 'Loadable/Goldfinch/Component/Team/Models/Nest/TeamRole.ss',
                ],
                [
                    'from' => $componentPathTemplates . 'Loadable/Goldfinch/Component/Team/Models/Nest/TeamItem.ss',
                    'to' => $themeTemplates . 'Loadable/Goldfinch/Component/Team/Models/Nest/TeamItem.ss',
                ],
            ];

            return $templater->copyFiles($files);
        } else {
            return $theme;
        }
    }
}
