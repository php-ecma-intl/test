<?php

declare(strict_types=1);

use Ecma\Intl\Locale;

$reflected = new ReflectionClass(Locale::class);

it('has a property named "collations"')
    ->expect($reflected->hasProperty('collations'))
    ->toBeTrue();

it('has a method named "getCollations"')
    ->expect($reflected->hasMethod('getCollations'))
    ->toBeTrue();
