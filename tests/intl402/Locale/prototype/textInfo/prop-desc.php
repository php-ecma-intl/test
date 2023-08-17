<?php

declare(strict_types=1);

use Ecma\Intl\Locale;
use Ecma\Intl\Locale\TextInfo;

$reflected = new ReflectionClass(Locale::class);

it('has textInfo')
    ->expect($reflected->hasProperty('textInfo'))
    ->toBeTrue()
    ->and($reflected->hasMethod('getTextInfo'))
    ->toBeTrue();

describe('Locale::$textInfo', function () use ($reflected): void {
    $property = $reflected->getProperty('textInfo');
    $type = $property->getType();

    test('its name is "textInfo"')
        ->expect($property->getName())
        ->toBe('textInfo');

    it('is a public property')
        ->expect($property->isPublic())
        ->toBeTrue();

    it('is not a static property')
        ->expect($property->isStatic())
        ->toBeFalse();

    it('is a readonly property')
        ->expect($property->isReadOnly())
        ->toBeTrue();

    it('is a TextInfo type and does not allow null values')
        ->expect($type)
        ->toBeInstanceOf(ReflectionType::class)
        ->and($type->allowsNull())
        ->toBeFalse()
        ->and($type->getName())
        ->toBe(TextInfo::class);
});

describe('Locale::getTextInfo', function () use ($reflected): void {
    $method = $reflected->getMethod('getTextInfo');
    $returnType = $method->getReturnType();

    test('its name is "getTextInfo"')
        ->expect($method->getName())
        ->toBe('getTextInfo');

    it('is a public method')
        ->expect($method->isPublic())
        ->toBeTrue();

    it('is not a static method')
        ->expect($method->isStatic())
        ->toBeFalse();

    it('returns a TextInfo type and does not return null')
        ->expect($returnType)
        ->toBeInstanceOf(ReflectionType::class)
        ->and($returnType->allowsNull())
        ->toBeFalse()
        ->and($returnType->getName())
        ->toBe(TextInfo::class);
});
