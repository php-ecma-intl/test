<?php

declare(strict_types=1);

use Ecma\Intl\Locale\Options;

$reflected = new ReflectionClass(Options::class);

test('its FQCN is Ecma\\Intl\\Locale\\Options')
    ->expect($reflected->getName())
    ->toBe('Ecma\\Intl\\Locale\\Options');

it('has a constructor')
    ->expect($reflected->hasMethod('__construct'))
    ->toBeTrue();

it('implements JsonSerializable')
    ->expect($reflected->implementsInterface(JsonSerializable::class))
    ->toBeTrue();

describe('__construct', function () use ($reflected): void {
    $constructor = $reflected->getMethod('__construct');

    it('is public')
        ->expect($constructor->isPublic())
        ->toBeTrue();

    it('has nine parameters')
        ->expect($constructor->getNumberOfParameters())
        ->toBe(9);

    it('does not have required parameters')
        ->expect($constructor->getNumberOfRequiredParameters())
        ->toBe(0);

    test('its first parameter is $calendar')
        ->expect($constructor->getParameters()[0]->getName())
        ->toBe('calendar')
        ->and($constructor->getParameters()[0]->getType()?->getName())
        ->toBe('string')
        ->and($constructor->getParameters()[0]->getType()?->allowsNull())
        ->toBeTrue();

    test('its second parameter is $caseFirst')
        ->expect($constructor->getParameters()[1]->getName())
        ->toBe('caseFirst')
        ->and($constructor->getParameters()[1]->getType()?->getName())
        ->toBe('string')
        ->and($constructor->getParameters()[1]->getType()?->allowsNull())
        ->toBeTrue();

    test('its third parameter is $collation')
        ->expect($constructor->getParameters()[2]->getName())
        ->toBe('collation')
        ->and($constructor->getParameters()[2]->getType()?->getName())
        ->toBe('string')
        ->and($constructor->getParameters()[2]->getType()?->allowsNull())
        ->toBeTrue();

    test('its fourth parameter is $hourCycle')
        ->expect($constructor->getParameters()[3]->getName())
        ->toBe('hourCycle')
        ->and($constructor->getParameters()[3]->getType()?->getName())
        ->toBe('string')
        ->and($constructor->getParameters()[3]->getType()?->allowsNull())
        ->toBeTrue();

    test('its fifth parameter is $language')
        ->expect($constructor->getParameters()[4]->getName())
        ->toBe('language')
        ->and($constructor->getParameters()[4]->getType()?->getName())
        ->toBe('string')
        ->and($constructor->getParameters()[4]->getType()?->allowsNull())
        ->toBeTrue();

    test('its sixth parameter is $numberingSystem')
        ->expect($constructor->getParameters()[5]->getName())
        ->toBe('numberingSystem')
        ->and($constructor->getParameters()[5]->getType()?->getName())
        ->toBe('string')
        ->and($constructor->getParameters()[5]->getType()?->allowsNull())
        ->toBeTrue();

    test('its seventh parameter is $numeric')
        ->expect($constructor->getParameters()[6]->getName())
        ->toBe('numeric')
        ->and($constructor->getParameters()[6]->getType()?->getName())
        ->toBe('bool')
        ->and($constructor->getParameters()[6]->getType()?->allowsNull())
        ->toBeTrue();

    test('its eighth parameter is $region')
        ->expect($constructor->getParameters()[7]->getName())
        ->toBe('region')
        ->and($constructor->getParameters()[7]->getType()?->getName())
        ->toBe('string')
        ->and($constructor->getParameters()[7]->getType()?->allowsNull())
        ->toBeTrue();

    test('its ninth parameter is $script')
        ->expect($constructor->getParameters()[8]->getName())
        ->toBe('script')
        ->and($constructor->getParameters()[8]->getType()?->getName())
        ->toBe('string')
        ->and($constructor->getParameters()[8]->getType()?->allowsNull())
        ->toBeTrue();
});

describe('jsonSerialize', function () use ($reflected): void {
    $jsonSerialize = $reflected->getMethod('jsonSerialize');

    it('is public')
        ->expect($jsonSerialize->isPublic())
        ->toBeTrue();

    it('has a return type hint of "object"')
        ->expect($jsonSerialize->getReturnType()?->getName())
        ->toBe('object')
        ->expect($jsonSerialize->getReturnType()?->allowsNull())
        ->toBeFalse();

    it('has zero parameters')
        ->expect($jsonSerialize->getNumberOfParameters())
        ->toBe(0);
});
