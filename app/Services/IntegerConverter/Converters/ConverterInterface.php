<?php

namespace App\Services\IntegerConverter\Converters;

/**
 * Interface for integer converters
 * 
 * @category Service
 * @package  RomanNumeralsApi
 * @author   Ash Phoenix <ashleyphoenix@ymail.com>
 * @license  https://opensource.org/licenses/GPL-3.0 GNU Public License
 * @link     https://github.com/netsells/roman-numerals-api
 */
interface ConverterInterface
{
    /**
     * Converts an integer
     * 
     * @param int $integer The integer to convert
     * 
     * @return string
     */
    public function convertInteger(int $integer) : string;

    /**
     * Gets the name of the converter
     * 
     * @return string
     */
    public static function getName() : string;

    /**
     * Gets the integer rules of the converter
     * 
     * @return array
     */
    public function getIntegerRules() : array;
}
