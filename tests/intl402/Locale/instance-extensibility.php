<?php

declare(strict_types=1);

use Ecma\Intl\Locale;

$reflected = new ReflectionClass(Locale::class);

it('allows extension')
    ->expect($reflected->isFinal())
    ->toBeFalse();
