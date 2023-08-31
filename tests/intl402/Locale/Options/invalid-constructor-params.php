<?php

declare(strict_types=1);

use Ecma\Intl\Locale\Options;

it('throws an exception for invalid calendar', function (): void {
    expect(fn () => new Options(calendar: 'gregoryab'))
        ->toThrow(ValueError::class);
});

it('throws an exception for invalid caseFirst', function (): void {
    expect(fn () => new Options(caseFirst: 'foobar'))
        ->toThrow(ValueError::class);
});

it('throws an exception for invalid collation', function (): void {
    expect(fn () => new Options(collation: 'emojiabcd'))
        ->toThrow(ValueError::class);
});

it('throws an exception for invalid currency', function (): void {
    expect(fn () => new Options(currency: 'foobar'))
        ->toThrow(ValueError::class);
});

it('throws an exception for invalid hourCycle', function (): void {
    expect(fn () => new Options(hourCycle: 'hour12'))
        ->toThrow(ValueError::class);
});

it('throws an exception for invalid language', function (): void {
    expect(fn () => new Options(language: 'english language'))
        ->toThrow(ValueError::class);
});

it('throws an exception for invalid numberingSystem', function (): void {
    expect(fn () => new Options(numberingSystem: 'numbersystem'))
        ->toThrow(ValueError::class);
});

it('throws an exception for invalid numeric', function (): void {
    expect(fn () => new Options(numeric: 1234))
        ->toThrow(TypeError::class);
});

it('throws an exception for invalid region', function (): void {
    expect(fn () => new Options(region: 'region'))
        ->toThrow(ValueError::class);
});

it('throws an exception for invalid script', function (): void {
    expect(fn () => new Options(script: 'script'))
        ->toThrow(ValueError::class);
});
