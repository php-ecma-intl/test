<?php

declare(strict_types=1);

use Ecma\Intl\Locale;

$reflected = new ReflectionClass(Locale::class);
$property = $reflected->getProperty('currencies');
$type = $property->getType();

test('its name is "currencies"')
    ->expect($property->getName())
    ->toBe('currencies');

it('is a public property')
    ->expect($property->isPublic())
    ->toBeTrue();

it('is not a static property')
    ->expect($property->isStatic())
    ->toBeFalse();

it('is a readonly property')
    ->expect($property->isReadOnly())
    ->toBeTrue();

it('is an array type and does not allow null values')
    ->expect($type)
    ->toBeInstanceOf(ReflectionType::class)
    ->and($type->allowsNull())
    ->toBeFalse()
    ->and($type->getName())
    ->toBe('array');

$method = $reflected->getMethod('getCurrencies');
$returnType = $method->getReturnType();

test('its name is "getCurrencies"')
    ->expect($method->getName())
    ->toBe('getCurrencies');

it('is a public method')
    ->expect($method->isPublic())
    ->toBeTrue();

it('is not a static method')
    ->expect($method->isStatic())
    ->toBeFalse();

it('returns an array type and does not return null')
    ->expect($returnType)
    ->toBeInstanceOf(ReflectionType::class)
    ->and($returnType->allowsNull())
    ->toBeFalse()
    ->and($returnType->getName())
    ->toBe('array');
