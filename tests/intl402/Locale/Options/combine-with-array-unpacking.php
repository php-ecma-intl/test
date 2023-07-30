<?php

declare(strict_types=1);

use Ecma\Intl\Locale\Options;

$optionsEnglish = new Options(language: 'en');
$optionsFrench = new Options(language: 'fr');
$optionsCA = new Options(region: 'CA');
$optionsUS = new Options(region: 'US');
$optionsGB = new Options(region: 'GB');

it('combines options using array unpacking')
    ->expect(json_encode(new Options(...[...$optionsCA, ...$optionsEnglish])))
    ->toBe('{"language":"en","region":"CA"}')
    ->and(json_encode(new Options(...[...$optionsUS, ...$optionsEnglish])))
    ->toBe('{"language":"en","region":"US"}')
    ->and(json_encode(new Options(...[...$optionsGB, ...$optionsEnglish])))
    ->toBe('{"language":"en","region":"GB"}')
    ->and(json_encode(new Options(...[...$optionsCA, ...$optionsFrench])))
    ->toBe('{"language":"fr","region":"CA"}');

