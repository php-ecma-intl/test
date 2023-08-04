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

it('implements Traversable')
    ->expect($reflected->implementsInterface(Traversable::class))
    ->toBeTrue();

describe('__construct', function () use ($reflected): void {
    $constructor = $reflected->getMethod('__construct');

    $testParameter = fn (int $index, string $name): Closure => function () use ($index, $name, $constructor): void {
        $parameter = $constructor->getParameters()[$index] ?? null;

        expect($parameter)
            ->not->toBeNull()
            ->and($parameter->getName())
            ->toBe($name);

        $type = $parameter->getType();

        expect($type)
            ->toBeInstanceOf(ReflectionUnionType::class)
            ->and($type->allowsNull())
            ->toBeTrue();

        $types = $type->getTypes();
        $names = array_map(fn (ReflectionNamedType $type): string => $type->getName(), $types);
        sort($names);

        $expected = ['Stringable', 'null', 'string'];
        if ($name === 'caseFirst') {
            $expected = ['Stringable', 'false', 'null', 'string'];
        }

        expect($names)
            ->toBe($expected);
    };

    it('is public')
        ->expect($constructor->isPublic())
        ->toBeTrue();

    it('has nine parameters')
        ->expect($constructor->getNumberOfParameters())
        ->toBe(9);

    it('does not have required parameters')
        ->expect($constructor->getNumberOfRequiredParameters())
        ->toBe(0);

    test('its first parameter is $calendar', $testParameter(0, 'calendar'));
    test('its second parameter is $caseFirst', $testParameter(1, 'caseFirst'));
    test('its third parameter is $collation', $testParameter(2, 'collation'));
    test('its fourth parameter is $hourCycle', $testParameter(3, 'hourCycle'));
    test('its fifth parameter is $language', $testParameter(4, 'language'));
    test('its sixth parameter is $numberingSystem', $testParameter(5, 'numberingSystem'));

    test('its seventh parameter is $numeric', function () use ($constructor): void {
        $parameter = $constructor->getParameters()[6] ?? null;
        expect($parameter)
            ->not->toBeNull()
            ->and($parameter->getName())
            ->toBe('numeric');

        $type = $parameter->getType();
        expect($type)
            ->toBeInstanceOf(ReflectionType::class)
            ->and($type->allowsNull())
            ->toBeTrue()
            ->and($type->getName())
            ->toBe('bool');
    });

    test('its eighth parameter is $region', $testParameter(7, 'region'));
    test('its ninth parameter is $script', $testParameter(8, 'script'));
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
