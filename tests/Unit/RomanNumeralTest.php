<?php

namespace Tests\Unit;

use App\Services\IntegerConverter\Converters\RomanNumeral;

/**
 * Unit test for integer -> roman numeral converter
 * 
 * @category UnitTest
 * @package  RomanNumeralsApi
 * @author   Ash Phoenix <ashleyphoenix@ymail.com>
 * @license  https://opensource.org/licenses/GPL-3.0 GNU Public License
 * @link     https://github.com/netsells/roman-numerals-api
 */
class RomanNumeralTest extends \PHPUnit\Framework\TestCase
{
    /**
     * The converter to test
     * 
     * @var RomanNumeral
     */
    private RomanNumeral $converter;

    /**
     * Sets up the model
     * 
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();

        $this->converter = new RomanNumeral();
    }

    /**
     * A function that tests converting integers to roman numerals
     * 
     * @return void
     */
    public function testConvertsIntegersToRomanNumerals(): void
    {
        // Test the basic conversions
        $to_test = [
            'I' => 1,
            'IV' => 4,
            'V' => 5,
            'IX' => 9,
            'X' => 10,
            'C' => 100,
            'XL' => 40,
            'L' => 50,
            'XC' => 90,
            'CD' => 400,
            'D' => 500,
            'CM' => 900,
            'M' => 1000,
        ];

        foreach ($to_test as $return_value => $integer) {
            $this->assertEquals($return_value, $this->converter->convertInteger($integer));
        }

        // Test more unique integers
        $this->assertEquals('MMMCMXCIX', $this->converter->convertInteger(3999));
        $this->assertEquals('MMXVI', $this->converter->convertInteger(2016));
        $this->assertEquals('MMXVIII', $this->converter->convertInteger(2018));
    }
}
