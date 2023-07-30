<?php

declare(strict_types=1);

use Ecma\Intl\Locale\Options;

$options = new Options(
    hourCycle: 'h23',
    language: 'en',
    numeric: false,
    region: 'US',
);

it('can access every option when only some have values')
    ->expect($options->calendar)
    ->toBeNull()
    ->expect($options->caseFirst)
    ->toBeNull()
    ->expect($options->collation)
    ->toBeNull()
    ->expect($options->hourCycle)
    ->toBe('h23')
    ->expect($options->language)
    ->toBe('en')
    ->expect($options->numberingSystem)
    ->toBeNull()
    ->expect($options->numeric)
    ->toBeFalse()
    ->expect($options->region)
    ->toBe('US')
    ->expect($options->script)
    ->toBeNull();

it('serializes to a JSON object with partial values')
    ->expect(json_encode($options))
    ->toBe('{"hourCycle":"h23","language":"en","numeric":false,"region":"US"}');

it('unpacks to a PHP array with partial values')
    ->expect([...$options])
    ->toBe([
        'hourCycle' => 'h23',
        'language' => 'en',
        'numeric' => false,
        'region' => 'US',
    ]);
