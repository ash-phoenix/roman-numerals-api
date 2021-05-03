<?php

namespace Tests\Unit;

use App\Services\IntegerConverter\Converters\Words;

/**
 * Unit test for integer -> words converter
 * 
 * @category UnitTest
 * @package  RomanNumeralsApi
 * @author   Ash Phoenix <ashleyphoenix@ymail.com>
 * @license  https://opensource.org/licenses/GPL-3.0 GNU Public License
 * @link     https://github.com/netsells/roman-numerals-api
 */
class WordsTest extends \PHPUnit\Framework\TestCase
{
    /**
     * The converter to test
     * 
     * @var Words
     */
    private Words $converter;

    /**
     * Sets up the model
     * 
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();

        $this->converter = new Words();
    }

    /**
     * A function that tests converting integers to words
     * 
     * @return void
     */
    public function testConvertsIntegersToWords(): void
    {
        // Test the basic conversions
        $to_test = [
            'one' => 1,
            'thirteen' => 13,
            'one hundred' => 100,
            'one thousand two hundred twenty-four' => 1224
        ];

        foreach ($to_test as $return_value => $integer) {
            $this->assertEquals($return_value, $this->converter->convertInteger($integer));
        }
    }
}
