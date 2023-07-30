<?php

declare(strict_types=1);

use Ecma\Intl\Locale;
use Ecma\Intl\Locale\Options;

// Pass Locale object and replace subtag.
$enUS = new Locale('en-US');
$enGB = new Locale($enUS, new Options(region: 'GB'));

test('(string) $enUS returns "en-US"')
    ->expect((string) $enUS)
    ->toBe('en-US');

test('(string) $enGB returns "en-GB"')
    ->expect((string) $enGB)
    ->toBe('en-GB');

// Pass Locale object and replace Unicode extension keyword.
$zhUnihan = new Locale('zh-u-co-unihan');
$zhZhuyin = new Locale($zhUnihan, new Options(collation: 'zhuyin'));

test('(string) $zhUnihan returns "zh-u-co-unihan"')
    ->expect((string) $zhUnihan)
    ->toBe('zh-u-co-unihan');

test('(string) $zhZhuyin returns "zh-u-co-zhuyin"')
    ->expect((string) $zhZhuyin)
    ->toBe('zh-u-co-zhuyin');

test('the value of $zhUnihan->collation is "unihan"')
    ->expect($zhUnihan->collation)
    ->toBe('unihan');

test('the value of $zhZhuyin->collation is "zhuyin"')
    ->expect($zhZhuyin->collation)
    ->toBe('zhuyin');
