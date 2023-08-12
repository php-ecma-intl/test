<?php

declare(strict_types=1);

use Ecma\Intl\Locale;

$reflected = new ReflectionClass(Locale::class);
$property = $reflected->getProperty('timeZones');
$type = $property->getType();

test('its name is "timeZones"')
    ->expect($property->getName())
    ->toBe('timeZones');

it('is a public property')
    ->expect($property->isPublic())
    ->toBeTrue();

it('is not a static property')
    ->expect($property->isStatic())
    ->toBeFalse();

it('is a readonly property')
    ->expect($property->isReadOnly())
    ->toBeTrue();

it('is an array type and allows null values')
    ->expect($type)
    ->toBeInstanceOf(ReflectionType::class)
    ->and($type->allowsNull())
    ->toBeTrue()
    ->and($type->getName())
    ->toBe('array');

$method = $reflected->getMethod('getTimeZones');
$returnType = $method->getReturnType();

test('its name is "getTimeZones"')
    ->expect($method->getName())
    ->toBe('getTimeZones');

it('is a public method')
    ->expect($method->isPublic())
    ->toBeTrue();

it('is not a static method')
    ->expect($method->isStatic())
    ->toBeFalse();

it('returns an array type and can return null')
    ->expect($returnType)
    ->toBeInstanceOf(ReflectionType::class)
    ->and($returnType->allowsNull())
    ->toBeTrue()
    ->and($returnType->getName())
    ->toBe('array');
