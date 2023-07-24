<?php

declare(strict_types=1);

use Ecma\Intl\Locale;

$reflected = new ReflectionClass(Locale::class);
$method = $reflected->getMethod('__toString');
$returnType = $method->getReturnType();

it('implements Stringable')
    ->expect($reflected->implementsInterface(Stringable::class))
    ->toBeTrue();

test('its name is "__toString"')
    ->expect($method->getName())
    ->toBe('__toString');

it('is a public method')
    ->expect($method->isPublic())
    ->toBeTrue();

it('is not a static method')
    ->expect($method->isStatic())
    ->toBeFalse();

it('has zero parameters')
    ->expect($method->getNumberOfParameters())
    ->toBe(0);

it('returns a string type')
    ->expect($returnType)
    ->toBeInstanceOf(ReflectionType::class)
    ->and($returnType->allowsNull())
    ->toBeFalse()
    ->and($returnType->getName())
    ->toBe('string');
