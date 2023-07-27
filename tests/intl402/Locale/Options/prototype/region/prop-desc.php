<?php

declare(strict_types=1);

use Ecma\Intl\Locale\Options;

$reflected = new ReflectionClass(Options::class);

test('Locale\\Options has a property named "region"')
    ->expect($reflected->hasProperty('region'))
    ->toBeTrue();

describe('property', function () use ($reflected): void {
    $property = $reflected->getProperty('region');
    $type = $property->getType();

    it('is named "region"')
        ->expect($property->getName())
        ->toBe('region');

    it('is a public property')
        ->expect($property->isPublic())
        ->toBeTrue();

    it('is not a static property')
        ->expect($property->isStatic())
        ->toBeFalse();

    it('is a readonly property')
        ->expect($property->isReadOnly())
        ->toBeTrue();

    it('is a string type and allows null values')
        ->expect($type)
        ->toBeInstanceOf(ReflectionType::class)
        ->and($type->allowsNull())
        ->toBeTrue()
        ->and($type->getName())
        ->toBe('string');
});
