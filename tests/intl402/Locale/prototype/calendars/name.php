<?php

declare(strict_types=1);

use Ecma\Intl\Locale;

$reflected = new ReflectionClass(Locale::class);

it('has a property named "calendars"')
    ->expect($reflected->hasProperty('calendars'))
    ->toBeTrue();

it('has a method named "getCalendars"')
    ->expect($reflected->hasMethod('getCalendars'))
    ->toBeTrue();
