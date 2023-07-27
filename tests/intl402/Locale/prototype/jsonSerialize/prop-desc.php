<?php

declare(strict_types=1);

use Ecma\Intl\Locale;

$reflected = new ReflectionClass(Locale::class);
$method = $reflected->getMethod('jsonSerialize');
$returnType = $method->getReturnType();

it('implements JsonSerializable')
    ->expect($reflected->implementsInterface(JsonSerializable::class))
    ->toBeTrue();

test('its name is "jsonSerialize"')
    ->expect($method->getName())
    ->toBe('jsonSerialize');

it('is a public method')
    ->expect($method->isPublic())
    ->toBeTrue();

it('is not a static method')
    ->expect($method->isStatic())
    ->toBeFalse();

it('has zero parameters')
    ->expect($method->getNumberOfParameters())
    ->toBe(0);

it('returns an object type')
    ->expect($returnType)
    ->toBeInstanceOf(ReflectionType::class)
    ->and($returnType->allowsNull())
    ->toBeFalse()
    ->and($returnType->getName())
    ->toBe('object');
