<?php

declare(strict_types=1);

use Ecma\Intl\Locale;

$reflected = new ReflectionClass(Locale::class);

it('has a property named "hourCycle"')
    ->expect($reflected->hasProperty('hourCycle'))
    ->toBeTrue();
