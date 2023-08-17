<?php

declare(strict_types=1);

use Ecma\Intl\Locale\CharacterDirection;
use Ecma\Intl\Locale\TextInfo;

$reflected = new ReflectionClass(TextInfo::class);

test('its FQCN is Ecma\\Intl\\Locale\\TextInfo')
    ->expect($reflected->getName())
    ->toBe('Ecma\\Intl\\Locale\\TextInfo');

it('has a property named "direction"')
    ->expect($reflected->hasProperty('direction'))
    ->toBeTrue();

it('has a __construct method')
    ->expect($reflected->hasMethod('__construct'))
    ->toBeTrue();

it('implements JsonSerializable')
    ->expect($reflected->getInterfaceNames())
    ->toContain(JsonSerializable::class);

describe('TextInfo::__construct', function () use ($reflected): void {
    $constructor = $reflected->getMethod('__construct');

    it('is public')
        ->expect($constructor->isPublic())
        ->toBeTrue();

    it('has one required parameter')
        ->expect($constructor->getNumberOfRequiredParameters())
        ->toBe(1);

    $parameter = $constructor->getParameters()[0] ?? null;

    test('its first parameter is $direction')
        ->expect($parameter)
        ->not->toBeNull()
        ->and($parameter->getName())
        ->toBe('direction')
        ->and($parameter->getType())
        ->toBeInstanceOf(ReflectionType::class)
        ->and($parameter->getType()->getName())
        ->toBe(CharacterDirection::class)
        ->and($parameter->getType()->allowsNull())
        ->toBeFalse();
});

describe('TextInfo::$direction', function () use ($reflected): void {
    $property = $reflected->getProperty('direction');
    $type = $property->getType();

    test('its name is "direction"')
        ->expect($property->getName())
        ->toBe('direction');

    it('is a public property')
        ->expect($property->isPublic())
        ->toBeTrue();

    it('is not a static property')
        ->expect($property->isStatic())
        ->toBeFalse();

    it('is a readonly property')
        ->expect($property->isReadOnly())
        ->toBeTrue();

    it('is a CharacterDirection type and does not allow null values')
        ->expect($type)
        ->toBeInstanceOf(ReflectionType::class)
        ->and($type->allowsNull())
        ->toBeFalse()
        ->and($type->getName())
        ->toBe(CharacterDirection::class);
});

describe('TextInfo::jsonSerialize', function () use ($reflected): void {
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

describe('CharacterDirection', function (): void {
    it('is a backed enum')
        ->expect(is_a(CharacterDirection::class, BackedEnum::class, true))
        ->toBeTrue();

    it('has a LeftToRight case with value "ltr"')
        ->expect(CharacterDirection::tryFrom('ltr'))
        ->toBe(CharacterDirection::LeftToRight)
        ->and(CharacterDirection::LeftToRight->value)
        ->toBe('ltr');

    it('has a RightToLeft case with value "rtl"')
        ->expect(CharacterDirection::tryFrom('rtl'))
        ->toBe(CharacterDirection::RightToLeft)
        ->and(CharacterDirection::RightToLeft->value)
        ->toBe('rtl');
});
