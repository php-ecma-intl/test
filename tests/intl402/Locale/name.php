<?php

declare(strict_types=1);

use Ecma\Intl\Locale;

$reflected = new ReflectionClass(Locale::class);

it('is a class named Ecma\\Intl\\Locale')
    ->expect($reflected->getName())
    ->toBe('Ecma\\Intl\\Locale');
