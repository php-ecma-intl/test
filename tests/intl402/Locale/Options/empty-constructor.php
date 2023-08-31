<?php

declare(strict_types=1);

use Ecma\Intl\Locale\Options;

$options = new Options();

it('constructs an object with all properties set to null')
    ->expect($options->calendar)
    ->toBeNull()
    ->and($options->caseFirst)
    ->toBeNull()
    ->and($options->collation)
    ->toBeNull()
    ->and($options->currency)
    ->toBeNull()
    ->and($options->hourCycle)
    ->toBeNull()
    ->and($options->language)
    ->toBeNull()
    ->and($options->numberingSystem)
    ->toBeNull()
    ->and($options->numeric)
    ->toBeNull()
    ->and($options->region)
    ->toBeNull()
    ->and($options->script)
    ->toBeNull();

it('serializes to an empty JSON object')
    ->expect(json_encode($options))
    ->toBe('{}');

it('unpacks to an empty PHP array')
    ->expect([...$options])
    ->toBe([]);
