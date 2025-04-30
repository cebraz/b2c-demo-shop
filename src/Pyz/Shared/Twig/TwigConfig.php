<?php

namespace Pyz\Shared\Twig;

use \Spryker\Shared\Twig\TwigConfig as SprykerConfig;

class TwigConfig extends SprykerConfig
{
    public function getYvesThemeName(): string
    {
        return 'green';
    }
}
