<?php

declare(strict_types=1);

use Ecma\Intl\Locale;

$reflected = new ReflectionClass(Locale::class);

it('has a property named "timeZones"')
    ->expect($reflected->hasProperty('timeZones'))
    ->toBeTrue();

it('has a method named "getTimeZones"')
    ->expect($reflected->hasMethod('getTimeZones'))
    ->toBeTrue();
