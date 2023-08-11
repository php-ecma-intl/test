<?php

declare(strict_types=1);

use Ecma\Intl\Locale;

$reflected = new ReflectionClass(Locale::class);

it('implements JsonSerializable and Stringable')
    ->expect($reflected->getInterfaceNames())
    ->toContain(JsonSerializable::class, Stringable::class);
