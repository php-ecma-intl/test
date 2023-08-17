<?php

declare(strict_types=1);

use Ecma\Intl\Locale;
use Ecma\Intl\Locale\WeekInfo;

$reflected = new ReflectionClass(Locale::class);

it('has weekInfo')
    ->expect($reflected->hasProperty('weekInfo'))
    ->toBeTrue()
    ->and($reflected->hasMethod('getWeekInfo'))
    ->toBeTrue();

describe('Locale::$weekInfo', function () use ($reflected): void {
    $property = $reflected->getProperty('weekInfo');
    $type = $property->getType();

    test('its name is "weekInfo"')
        ->expect($property->getName())
        ->toBe('weekInfo');

    it('is a public property')
        ->expect($property->isPublic())
        ->toBeTrue();

    it('is not a static property')
        ->expect($property->isStatic())
        ->toBeFalse();

    it('is a readonly property')
        ->expect($property->isReadOnly())
        ->toBeTrue();

    it('is a WeekInfo type and does not allow null values')
        ->expect($type)
        ->toBeInstanceOf(ReflectionType::class)
        ->and($type->allowsNull())
        ->toBeFalse()
        ->and($type->getName())
        ->toBe(WeekInfo::class);
});

describe('Locale::getWeekInfo', function () use ($reflected): void {
    $method = $reflected->getMethod('getWeekInfo');
    $returnType = $method->getReturnType();

    test('its name is "getWeekInfo"')
        ->expect($method->getName())
        ->toBe('getWeekInfo');

    it('is a public method')
        ->expect($method->isPublic())
        ->toBeTrue();

    it('is not a static method')
        ->expect($method->isStatic())
        ->toBeFalse();

    it('returns a WeekInfo type and does not return null')
        ->expect($returnType)
        ->toBeInstanceOf(ReflectionType::class)
        ->and($returnType->allowsNull())
        ->toBeFalse()
        ->and($returnType->getName())
        ->toBe(WeekInfo::class);
});
