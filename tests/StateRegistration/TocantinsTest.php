<?php

namespace Brazanation\Documents\Tests\StateRegistration;

use Brazanation\Documents\StateRegistration;
use Brazanation\Documents\StateRegistration\Tocantins;
use Brazanation\Documents\Tests\DocumentTestCase;

class TocantinsTest extends DocumentTestCase
{
    public function createDocument($number)
    {
        return new StateRegistration($number, new Tocantins());
    }

    public function createDocumentFromString($number)
    {
        return StateRegistration::createFromString($number, Tocantins::SHORT_NAME);
    }

    public function provideValidNumbers()
    {
        return [
            ['29010227836'],
            ['290406340'],
            ['293855242'],
            ['29032038-0'],
            ['29074854-2'],
            ['29380563-6']
        ];
    }

    public function provideValidNumbersAndExpectedFormat()
    {
        return [
            ['29010227836', '29.01.022.783-6'],
        ];
    }

    public function provideEmptyData()
    {
        return [
            [Tocantins::LONG_NAME, ''],
        ];
    }

    public function provideInvalidNumber()
    {
        return [
            [Tocantins::LONG_NAME, '1111111111'],
            [Tocantins::LONG_NAME, '00000000021464'],
        ];
    }
}
