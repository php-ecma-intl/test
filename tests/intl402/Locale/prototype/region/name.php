<?php

declare(strict_types=1);

use Ecma\Intl\Locale;

$reflected = new ReflectionClass(Locale::class);

it('has a property named "region"')
    ->expect($reflected->hasProperty('region'))
    ->toBeTrue();
