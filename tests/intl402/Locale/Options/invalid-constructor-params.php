<?php

declare(strict_types=1);

use Ecma\Intl\Locale\Options;

it('throws an exception for invalid calendar', function (): void {
    expect(fn () => new Options(calendar: 'gregoryab'))
        ->toThrow(ValueError::class, 'calendar is not a well-formed calendar value');
});

it('throws an exception for invalid caseFirst', function (): void {
    expect(fn () => new Options(caseFirst: 'foobar'))
        ->toThrow(ValueError::class, 'caseFirst must be either "upper", "lower", or "false"');
});

it('throws an exception for invalid collation', function (): void {
    expect(fn () => new Options(collation: 'emojiabcd'))
        ->toThrow(ValueError::class, 'collation is not a well-formed collation value');
});

it('throws an exception for invalid hourCycle', function (): void {
    expect(fn () => new Options(hourCycle: 'hour12'))
        ->toThrow(ValueError::class, 'hourCycle must be "h11", "h12", "h23", or "h24"');
});

it('throws an exception for invalid language', function (): void {
    expect(fn () => new Options(language: 'english language'))
        ->toThrow(ValueError::class, 'language is not a well-formed language value');
});

it('throws an exception for invalid numberingSystem', function (): void {
    expect(fn () => new Options(numberingSystem: 'numbersystem'))
        ->toThrow(ValueError::class, 'numberingSystem is not a well-formed numbering system value');
});

it('throws an exception for invalid numeric', function (): void {
    expect(fn () => new Options(numeric: 1234))
        ->toThrow(
            TypeError::class,
            'Ecma\Intl\Locale\Options::__construct(): Argument #7 ($numeric) must be of type ?bool, int given',
        );
});

it('throws an exception for invalid region', function (): void {
    expect(fn () => new Options(region: 'region'))
        ->toThrow(ValueError::class, 'region is not a well-formed region value');
});

it('throws an exception for invalid script', function (): void {
    expect(fn () => new Options(script: 'script'))
        ->toThrow(ValueError::class, 'script is not a well-formed script value');
});
