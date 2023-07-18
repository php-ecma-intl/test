<?php

declare(strict_types=1);

use Ecma\Intl;
use Ecma\Intl\Category;

$numberingSystems = Intl::supportedValuesOf(Category::NumberingSystem);

it('includes numbering systems with simple digit mappings')
    ->with(array_keys(NUMBERING_SYSTEM_DIGITS))
    ->expect(fn (string $numberingSystem): string => $numberingSystem)
    ->toBeIn($numberingSystems);
