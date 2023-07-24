<?php

declare(strict_types=1);

use Ecma\Intl\Locale;

$reflected = new ReflectionClass(Locale::class);
$method = $reflected->getMethod('__construct');
$parameters = $method->getParameters();

test('its name is "__construct"')
    ->expect($method->getName())
    ->toBe('__construct');

it('is a public method')
    ->expect($method->isPublic())
    ->toBeTrue();

it('is not a static method')
    ->expect($method->isStatic())
    ->toBeFalse();

it('has one required parameter')
    ->expect($method->getNumberOfRequiredParameters())
    ->toBe(1);

test('its first parameter is $tag')
    ->expect($parameters[0]->getName())
    ->toBe('tag');

test('$tag requires a non-null string or Stringable value', function () use ($parameters): void {
    $tag = $parameters[0];
    $typeNames = [];
    $expectedTypeNames = [Stringable::class, 'string'];

    foreach ($tag->getType()?->getTypes() ?? [] as $type) {
        $typeNames[] = $type->getName();
    }

    sort($expectedTypeNames);
    sort($typeNames);

    expect($tag->getType())
        ->toBeInstanceOf(ReflectionUnionType::class)
        ->and($tag->allowsNull())
        ->toBeFalse()
        ->and($typeNames)
        ->toBe($expectedTypeNames);
});
