<?php

declare(strict_types=1);

use Ecma\Intl\Locale;

$reflected = new ReflectionClass(Locale::class);
$property = $reflected->getProperty('language');
$type = $property->getType();

test('its name is "language"')
    ->expect($property->getName())
    ->toBe('language');

it('is a public property')
    ->expect($property->isPublic())
    ->toBeTrue();

it('is not a static property')
    ->expect($property->isStatic())
    ->toBeFalse();

it('is a readonly property')
    ->expect($property->isReadOnly())
    ->toBeTrue();

it('is a string type and does not allow null values')
    ->expect($type)
    ->toBeInstanceOf(ReflectionType::class)
    ->and($type->allowsNull())
    ->toBeFalse()
    ->and($type->getName())
    ->toBe('string');