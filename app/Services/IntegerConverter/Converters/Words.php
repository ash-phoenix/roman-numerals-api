<?php

namespace App\Services\IntegerConverter\Converters;

use NumberFormatter;

/**
 * Integer to words converter
 * 
 * @category Service
 * @package  RomanNumeralsApi
 * @author   Ash Phoenix <ashleyphoenix@ymail.com>
 * @license  https://opensource.org/licenses/GPL-3.0 GNU Public License
 * @link     https://github.com/netsells/roman-numerals-api
 */
class Words implements \App\Services\IntegerConverter\Converters\ConverterInterface
{
    /**
     * Converts an integer to words
     * 
     * @param int $integer The integer to convert
     * 
     * @return string
     */
    public function convertInteger(int $integer) : string
    { 
        $formatter = new NumberFormatter('en', NumberFormatter::SPELLOUT);
        return $formatter->format($integer);
    } 

    /**
     * Gets the name of the converter
     * 
     * @return string
     */
    public static function getName() : string
    {
        return 'words';
    }

    /**
     * Gets the integer rules of the converter
     * 
     * @return array
     */
    public function getIntegerRules() : array
    {
        return [
            'required',
            'integer',
            'min:1',
            'max:3999',
        ];
    }
}
