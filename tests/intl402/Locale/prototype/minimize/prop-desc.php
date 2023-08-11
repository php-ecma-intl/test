<?php

declare(strict_types=1);

use Ecma\Intl\Locale;

$reflected = new ReflectionClass(Locale::class);
$method = $reflected->getMethod('minimize');
$returnType = $method->getReturnType();

test('its name is "minimize"')
    ->expect($method->getName())
    ->toBe('minimize');

it('is a public method')
    ->expect($method->isPublic())
    ->toBeTrue();

it('is not a static method')
    ->expect($method->isStatic())
    ->toBeFalse();

it('has zero parameters')
    ->expect($method->getNumberOfParameters())
    ->toBe(0);

it('returns a Locale')
    ->expect($returnType)
    ->toBeInstanceOf(ReflectionType::class)
    ->and($returnType->allowsNull())
    ->toBeFalse()
    ->and($returnType->getName())
    ->toBe(Locale::class);
