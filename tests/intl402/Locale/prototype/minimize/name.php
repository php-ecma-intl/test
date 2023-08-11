<?php

declare(strict_types=1);

use Ecma\Intl\Locale;

$reflected = new ReflectionClass(Locale::class);

it('has a method named "minimize"')
    ->expect($reflected->hasMethod('minimize'))
    ->toBeTrue();
