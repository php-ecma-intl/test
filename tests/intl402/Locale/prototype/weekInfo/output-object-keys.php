<?php

declare(strict_types=1);

use Ecma\Intl\Locale\WeekDay;
use Ecma\Intl\Locale\WeekInfo;

$reflected = new ReflectionClass(WeekInfo::class);

test('its FQCN is Ecma\\Intl\\Locale\\WeekInfo')
    ->expect($reflected->getName())
    ->toBe('Ecma\\Intl\\Locale\\WeekInfo');

it('has a property named "firstDay"')
    ->expect($reflected->hasProperty('firstDay'))
    ->toBeTrue();

it('has a property named "weekend"')
    ->expect($reflected->hasProperty('weekend'))
    ->toBeTrue();

it('has a property named "minimalDays"')
    ->expect($reflected->hasProperty('minimalDays'))
    ->toBeTrue();

it('has a __construct method')
    ->expect($reflected->hasMethod('__construct'))
    ->toBeTrue();

it('implements JsonSerializable')
    ->expect($reflected->getInterfaceNames())
    ->toContain(JsonSerializable::class);

describe('WeekInfo::__construct', function () use ($reflected): void {
    $constructor = $reflected->getMethod('__construct');

    it('is public')
        ->expect($constructor->isPublic())
        ->toBeTrue();

    it('has three required parameters')
        ->expect($constructor->getNumberOfRequiredParameters())
        ->toBe(3);

    $parameter1 = $constructor->getParameters()[0] ?? null;
    $parameter2 = $constructor->getParameters()[1] ?? null;
    $parameter3 = $constructor->getParameters()[2] ?? null;

    test('its first parameter is $firstDay')
        ->expect($parameter1)
        ->not->toBeNull()
        ->and($parameter1->getName())
        ->toBe('firstDay')
        ->and($parameter1->getType())
        ->toBeInstanceOf(ReflectionType::class)
        ->and($parameter1->getType()->getName())
        ->toBe(WeekDay::class)
        ->and($parameter1->getType()->allowsNull())
        ->toBeFalse();

    test('its second parameter is $weekend')
        ->expect($parameter2)
        ->not->toBeNull()
        ->and($parameter2->getName())
        ->toBe('weekend')
        ->and($parameter2->getType())
        ->toBeInstanceOf(ReflectionType::class)
        ->and($parameter2->getType()->getName())
        ->toBe('array')
        ->and($parameter2->getType()->allowsNull())
        ->toBeFalse();

    test('its third parameter is $minimalDays')
        ->expect($parameter3)
        ->not->toBeNull()
        ->and($parameter3->getName())
        ->toBe('minimalDays')
        ->and($parameter3->getType())
        ->toBeInstanceOf(ReflectionType::class)
        ->and($parameter3->getType()->getName())
        ->toBe('int')
        ->and($parameter3->getType()->allowsNull())
        ->toBeFalse();

    test('$weekend array throws TypeError for non-WeekDay values', function (mixed $value): void {
        expect(fn (): WeekInfo => new WeekInfo(WeekDay::Sunday, [$value], 1))
            ->toThrow(TypeError::class);
    })->with([
        'foo',
        1234,
        12.34,
        true,
        false,
        null,
        new stdClass(),
        [1, 2, 3],
    ]);
});

describe('WeekInfo::$firstDay', function () use ($reflected): void {
    $property = $reflected->getProperty('firstDay');
    $type = $property->getType();

    test('its name is "firstDay"')
        ->expect($property->getName())
        ->toBe('firstDay');

    it('is a public property')
        ->expect($property->isPublic())
        ->toBeTrue();

    it('is not a static property')
        ->expect($property->isStatic())
        ->toBeFalse();

    it('is a readonly property')
        ->expect($property->isReadOnly())
        ->toBeTrue();

    it('is a WeekDay type and does not allow null values')
        ->expect($type)
        ->toBeInstanceOf(ReflectionType::class)
        ->and($type->allowsNull())
        ->toBeFalse()
        ->and($type->getName())
        ->toBe(WeekDay::class);
});

describe('WeekInfo::$minimalDays', function () use ($reflected): void {
    $property = $reflected->getProperty('minimalDays');
    $type = $property->getType();

    test('its name is "minimalDays"')
        ->expect($property->getName())
        ->toBe('minimalDays');

    it('is a public property')
        ->expect($property->isPublic())
        ->toBeTrue();

    it('is not a static property')
        ->expect($property->isStatic())
        ->toBeFalse();

    it('is a readonly property')
        ->expect($property->isReadOnly())
        ->toBeTrue();

    it('is an int type and does not allow null values')
        ->expect($type)
        ->toBeInstanceOf(ReflectionType::class)
        ->and($type->allowsNull())
        ->toBeFalse()
        ->and($type->getName())
        ->toBe('int');
});

describe('WeekInfo::jsonSerialize', function () use ($reflected): void {
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

describe('WeekDay', function (): void {
    it('is a backed enum')
        ->expect(is_a(WeekDay::class, BackedEnum::class, true))
        ->toBeTrue();

    it('has a Monday case with value 1')
        ->expect(WeekDay::tryFrom(1))
        ->toBe(WeekDay::Monday)
        ->and(WeekDay::Monday->value)
        ->toBe(1);

    it('has a Tuesday case with value 2')
        ->expect(WeekDay::tryFrom(2))
        ->toBe(WeekDay::Tuesday)
        ->and(WeekDay::Tuesday->value)
        ->toBe(2);

    it('has a Wednesday case with value 3')
        ->expect(WeekDay::tryFrom(3))
        ->toBe(WeekDay::Wednesday)
        ->and(WeekDay::Wednesday->value)
        ->toBe(3);

    it('has a Thursday case with value 4')
        ->expect(WeekDay::tryFrom(4))
        ->toBe(WeekDay::Thursday)
        ->and(WeekDay::Thursday->value)
        ->toBe(4);

    it('has a Friday case with value 5')
        ->expect(WeekDay::tryFrom(5))
        ->toBe(WeekDay::Friday)
        ->and(WeekDay::Friday->value)
        ->toBe(5);

    it('has a Saturday case with value 6')
        ->expect(WeekDay::tryFrom(6))
        ->toBe(WeekDay::Saturday)
        ->and(WeekDay::Saturday->value)
        ->toBe(6);

    it('has a Sunday case with value 7')
        ->expect(WeekDay::tryFrom(7))
        ->toBe(WeekDay::Sunday)
        ->and(WeekDay::Sunday->value)
        ->toBe(7);
});
