<?php

declare(strict_types=1);

use Ecma\Intl\Locale\Options;

$options = new Options(
    calendar: 'gregory',
    caseFirst: 'upper',
    collation: 'emoji',
    hourCycle: 'h23',
    language: 'en',
    numberingSystem: 'latn',
    numeric: true,
    region: 'US',
    script: 'Latn',
);

it('can access every option when all are populated')
    ->expect($options->calendar)
    ->toBe('gregory')
    ->expect($options->caseFirst)
    ->toBe('upper')
    ->expect($options->collation)
    ->toBe('emoji')
    ->expect($options->hourCycle)
    ->toBe('h23')
    ->expect($options->language)
    ->toBe('en')
    ->expect($options->numberingSystem)
    ->toBe('latn')
    ->expect($options->numeric)
    ->toBeTrue()
    ->expect($options->region)
    ->toBe('US')
    ->expect($options->script)
    ->toBe('Latn');

it('serializes to a JSON object')
    ->expect(json_encode($options))
    ->toBe(
        '{"calendar":"gregory","caseFirst":"upper","collation":"emoji",'
        . '"hourCycle":"h23","language":"en","numberingSystem":"latn",'
        . '"numeric":true,"region":"US","script":"Latn"}',
    );

it('unpacks to a PHP array')
    ->expect([...$options])
    ->toBe([
        'calendar' => 'gregory',
        'caseFirst' => 'upper',
        'collation' => 'emoji',
        'hourCycle' => 'h23',
        'language' => 'en',
        'numberingSystem' => 'latn',
        'numeric' => true,
        'region' => 'US',
        'script' => 'Latn',
    ]);
