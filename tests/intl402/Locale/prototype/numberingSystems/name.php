<?php

declare(strict_types=1);

use Ecma\Intl\Locale;

$reflected = new ReflectionClass(Locale::class);

it('has a property named "numberingSystems"')
    ->expect($reflected->hasProperty('numberingSystems'))
    ->toBeTrue();

it('has a method named "getNumberingSystems"')
    ->expect($reflected->hasMethod('getNumberingSystems'))
    ->toBeTrue();
