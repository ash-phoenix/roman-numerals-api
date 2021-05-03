<?php

namespace Tests\Unit;

use App\Services\IntegerConverter\Converters\Hex;

/**
 * Unit test for integer -> hex converter
 * 
 * @category UnitTest
 * @package  RomanNumeralsApi
 * @author   Ash Phoenix <ashleyphoenix@ymail.com>
 * @license  https://opensource.org/licenses/GPL-3.0 GNU Public License
 * @link     https://github.com/netsells/roman-numerals-api
 */
class HexTest extends \PHPUnit\Framework\TestCase
{
    /**
     * The converter to test
     * 
     * @var Hex
     */
    private Hex $converter;

    /**
     * Sets up the model
     * 
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();

        $this->converter = new Hex();
    }

    /**
     * A function that tests converting integers to hex
     * 
     * @return void
     */
    public function testConvertsIntegersToHex(): void
    {
        // Test the basic conversions
        $to_test = [
            '1' => 1,
            'd' => 13,
            '64' => 100,
            '4c8' => 1224
        ];

        foreach ($to_test as $return_value => $integer) {
            $this->assertEquals($return_value, $this->converter->convertInteger($integer));
        }
    }
}
