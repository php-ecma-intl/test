<?php

declare(strict_types=1);

use Ecma\Intl\Locale;

$reflected = new ReflectionClass(Locale::class);
$property = $reflected->getProperty('collation');
$type = $property->getType();

test('its name is "collation"')
    ->expect($property->getName())
    ->toBe('collation');

it('is a public property')
    ->expect($property->isPublic())
    ->toBeTrue();

it('is not a static property')
    ->expect($property->isStatic())
    ->toBeFalse();

it('is a readonly property')
    ->expect($property->isReadOnly())
    ->toBeTrue();

it('is a string type and allows null values')
    ->expect($type)
    ->toBeInstanceOf(ReflectionType::class)
    ->and($type->allowsNull())
    ->toBeTrue()
    ->and($type->getName())
    ->toBe('string');
