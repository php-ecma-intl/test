<?php

declare(strict_types=1);

use Ecma\Intl\Locale;

$langtag = 'de-latn-de-u-ca-gregory-co-phonebk-hc-h23-kf-true-kn-false-nu-latn';
$loc = new Locale($langtag);

test('all getters return the expected results')
    ->expect((string) $loc)
    ->toBe('de-Latn-DE-u-ca-gregory-co-phonebk-hc-h23-kf-kn-false-nu-latn')
    ->and($loc->baseName)->toBe('de-Latn-DE')
    ->and($loc->calendar)->toBe('gregory')
    ->and($loc->calendars)->toBe(['gregory'])
    ->and($loc->caseFirst)->toBe('yes')
    ->and($loc->collation)->toBe('phonebk')
    ->and($loc->hourCycle)->toBe('h23')
    ->and($loc->language)->toBe('de')
    ->and($loc->numberingSystem)->toBe('latn')
    ->and($loc->numeric)->toBeFalse()
    ->and($loc->region)->toBe('DE')
    ->and($loc->script)->toBe('Latn')
    ->and($loc->getCalendars())->toBe($loc->calendars);

$loc = new Locale($langtag, new Locale\Options(
    calendar: 'japanese',
    caseFirst: 'false',
    collation: 'search',
    hourCycle: 'h24',
    language: 'ja',
    numberingSystem: 'jpanfin',
    numeric: true,
    region: 'jp',
    script: 'jpan',
));

test('all getters return the expected results after replacing all components through option values')
    ->expect((string) $loc)
    ->toBe('ja-Jpan-JP-u-ca-japanese-co-search-hc-h24-kf-false-kn-nu-jpanfin')
    ->and($loc->baseName)->toBe('ja-Jpan-JP')
    ->and($loc->calendar)->toBe('japanese')
    ->and($loc->calendars)->toBe(['japanese'])
    ->and($loc->caseFirst)->toBe('false')
    ->and($loc->collation)->toBe('search')
    ->and($loc->hourCycle)->toBe('h24')
    ->and($loc->language)->toBe('ja')
    ->and($loc->numberingSystem)->toBe('jpanfin')
    ->and($loc->numeric)->toBeTrue()
    ->and($loc->region)->toBe('JP')
    ->and($loc->script)->toBe('Jpan')
    ->and($loc->getCalendars())->toBe($loc->calendars);

$loc = new Locale($langtag, new Locale\Options(
    collation: 'standard',
    hourCycle: 'h11',
    language: 'fr',
    region: 'ca',
));

test('all getters return the expected results after replacing only some components through option values')
    ->expect((string) $loc)
    ->toBe('fr-Latn-CA-u-ca-gregory-co-standard-hc-h11-kf-kn-false-nu-latn')
    ->and($loc->baseName)->toBe('fr-Latn-CA')
    ->and($loc->calendar)->toBe('gregory')
    ->and($loc->calendars)->toBe(['gregory'])
    ->and($loc->caseFirst)->toBe('yes')
    ->and($loc->collation)->toBe('standard')
    ->and($loc->hourCycle)->toBe('h11')
    ->and($loc->language)->toBe('fr')
    ->and($loc->numberingSystem)->toBe('latn')
    ->and($loc->numeric)->toBeFalse()
    ->and($loc->region)->toBe('CA')
    ->and($loc->script)->toBe('Latn')
    ->and($loc->getCalendars())->toBe($loc->calendars);
