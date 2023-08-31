<?php

declare(strict_types=1);

use Ecma\Intl\Locale;

$langtag = 'de-latn-de-u-ca-gregory-co-phonebk-hc-h23-kf-true-kn-false-nu-latn-cu-eur';
$loc = new Locale($langtag);

test('all getters return the expected results')
    ->expect((string) $loc)
    ->toBe('de-Latn-DE-u-ca-gregory-co-phonebk-cu-eur-hc-h23-kf-kn-false-nu-latn')
    ->and($loc->baseName)->toBe('de-Latn-DE')
    ->and($loc->calendar)->toBe('gregory')
    ->and($loc->calendars)->toBe(['gregory'])
    ->and($loc->caseFirst)->toBe('yes')
    ->and($loc->collation)->toBe('phonebk')
    ->and($loc->collations)->toBe(['phonebk'])
    ->and($loc->currencies)->toBe(['EUR'])
    ->and($loc->currency)->toBe('EUR')
    ->and($loc->hourCycle)->toBe('h23')
    ->and($loc->hourCycles)->toBe(['h23'])
    ->and($loc->language)->toBe('de')
    ->and($loc->numberingSystem)->toBe('latn')
    ->and($loc->numberingSystems)->toBe(['latn'])
    ->and($loc->numeric)->toBeFalse()
    ->and($loc->region)->toBe('DE')
    ->and($loc->script)->toBe('Latn')
    ->and($loc->getCalendars())->toBe($loc->calendars)
    ->and($loc->getCollations())->toBe($loc->collations)
    ->and($loc->getCurrencies())->toBe($loc->currencies)
    ->and($loc->getHourCycles())->toBe($loc->hourCycles)
    ->and($loc->getNumberingSystems())->toBe($loc->numberingSystems);

$loc = new Locale($langtag, new Locale\Options(
    calendar: 'japanese',
    caseFirst: 'false',
    collation: 'search',
    currency: 'JPY',
    hourCycle: 'h24',
    language: 'ja',
    numberingSystem: 'jpanfin',
    numeric: true,
    region: 'jp',
    script: 'jpan',
));

test('all getters return the expected results after replacing all components through option values')
    ->expect((string) $loc)
    ->toBe('ja-Jpan-JP-u-ca-japanese-co-search-cu-jpy-hc-h24-kf-false-kn-nu-jpanfin')
    ->and($loc->baseName)->toBe('ja-Jpan-JP')
    ->and($loc->calendar)->toBe('japanese')
    ->and($loc->calendars)->toBe(['japanese'])
    ->and($loc->caseFirst)->toBe('false')
    ->and($loc->collation)->toBe('search')
    ->and($loc->collations)->toBe(['search'])
    ->and($loc->currencies)->toBe(['JPY'])
    ->and($loc->currency)->toBe('JPY')
    ->and($loc->hourCycle)->toBe('h24')
    ->and($loc->hourCycles)->toBe(['h24'])
    ->and($loc->language)->toBe('ja')
    ->and($loc->numberingSystem)->toBe('jpanfin')
    ->and($loc->numberingSystems)->toBe(['jpanfin'])
    ->and($loc->numeric)->toBeTrue()
    ->and($loc->region)->toBe('JP')
    ->and($loc->script)->toBe('Jpan')
    ->and($loc->getCalendars())->toBe($loc->calendars)
    ->and($loc->getCollations())->toBe($loc->collations)
    ->and($loc->getCurrencies())->toBe($loc->currencies)
    ->and($loc->getHourCycles())->toBe($loc->hourCycles)
    ->and($loc->getNumberingSystems())->toBe($loc->numberingSystems);

$loc = new Locale($langtag, new Locale\Options(
    collation: 'standard',
    hourCycle: 'h11',
    language: 'fr',
    region: 'ca',
));

test('all getters return the expected results after replacing only some components through option values')
    ->expect((string) $loc)
    ->toBe('fr-Latn-CA-u-ca-gregory-co-standard-cu-eur-hc-h11-kf-kn-false-nu-latn')
    ->and($loc->baseName)->toBe('fr-Latn-CA')
    ->and($loc->calendar)->toBe('gregory')
    ->and($loc->calendars)->toBe(['gregory'])
    ->and($loc->caseFirst)->toBe('yes')
    ->and($loc->collation)->toBe('standard')
    ->and($loc->collations)->toBe(['standard'])
    ->and($loc->currencies)->toBe(['EUR'])
    ->and($loc->currency)->toBe('EUR')
    ->and($loc->hourCycle)->toBe('h11')
    ->and($loc->hourCycles)->toBe(['h11'])
    ->and($loc->language)->toBe('fr')
    ->and($loc->numberingSystem)->toBe('latn')
    ->and($loc->numberingSystems)->toBe(['latn'])
    ->and($loc->numeric)->toBeFalse()
    ->and($loc->region)->toBe('CA')
    ->and($loc->script)->toBe('Latn')
    ->and($loc->getCalendars())->toBe($loc->calendars)
    ->and($loc->getCollations())->toBe($loc->collations)
    ->and($loc->getCurrencies())->toBe($loc->currencies)
    ->and($loc->getHourCycles())->toBe($loc->hourCycles)
    ->and($loc->getNumberingSystems())->toBe($loc->numberingSystems);
