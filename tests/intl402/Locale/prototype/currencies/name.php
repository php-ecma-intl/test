<?php

declare(strict_types=1);

use Ecma\Intl\Locale;

$reflected = new ReflectionClass(Locale::class);

it('has a property named "currencies"')
    ->expect($reflected->hasProperty('currencies'))
    ->toBeTrue();

it('has a method named "getCurrencies"')
    ->expect($reflected->hasMethod('getCurrencies'))
    ->toBeTrue();
