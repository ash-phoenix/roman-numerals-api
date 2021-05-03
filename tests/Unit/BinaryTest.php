<?php

namespace Tests\Unit;

use App\Services\IntegerConverter\Converters\Binary;

/**
 * Unit test for integer -> binary converter
 * 
 * @category UnitTest
 * @package  RomanNumeralsApi
 * @author   Ash Phoenix <ashleyphoenix@ymail.com>
 * @license  https://opensource.org/licenses/GPL-3.0 GNU Public License
 * @link     https://github.com/netsells/roman-numerals-api
 */
class BinaryTest extends \PHPUnit\Framework\TestCase
{
    /**
     * The converter to test
     * 
     * @var Binary
     */
    private Binary $converter;

    /**
     * Sets up the model
     * 
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();

        $this->converter = new Binary();
    }

    /**
     * A function that tests converting integers to binary
     * 
     * @return void
     */
    public function testConvertsIntegersToBinary(): void
    {
        // Test the basic conversions
        $to_test = [
            '1' => 1,
            '1101' => 13,
            '1100100' => 100,
            '10011001000' => 1224
        ];

        foreach ($to_test as $return_value => $integer) {
            $this->assertEquals($return_value, $this->converter->convertInteger($integer));
        }
    }
}
