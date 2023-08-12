<?php

declare(strict_types=1);

use Ecma\Intl\Locale;

$reflected = new ReflectionClass(Locale::class);

it('has a property named "hourCycles"')
    ->expect($reflected->hasProperty('hourCycles'))
    ->toBeTrue();

it('has a method named "getHourCycles"')
    ->expect($reflected->hasMethod('getHourCycles'))
    ->toBeTrue();
