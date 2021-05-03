<?php

namespace App\Services\IntegerConverter\Converters;

/**
 * Integer to roman numeral converter
 * 
 * @category Service
 * @package  RomanNumeralsApi
 * @author   Ash Phoenix <ashleyphoenix@ymail.com>
 * @license  https://opensource.org/licenses/GPL-3.0 GNU Public License
 * @link     https://github.com/netsells/roman-numerals-api
 */
class RomanNumeral implements \App\Services\IntegerConverter\Converters\ConverterInterface
{
    /**
     * Possible roman numerals
     *
     * @var array
     */
    private array $numerals = [
        'M'  => 1000, 
        'CM' => 900, 
        'D'  => 500, 
        'CD' => 400, 
        'C'  => 100, 
        'XC' => 90, 
        'L'  => 50, 
        'XL' => 40, 
        'X'  => 10, 
        'IX' => 9, 
        'V'  => 5, 
        'IV' => 4, 
        'I'  => 1
    ];

    /**
     * Converts an integer to a roman numeral
     * 
     * @param int $integer The integer to convert
     * 
     * @return string
     */
    public function convertInteger(int $integer) : string
    { 
        $res = ''; 
    
        foreach ($this->numerals as $numeral_char => $numeral_num) { 
            if ($numeral_char <= $integer) {
                $res .= str_repeat($numeral_char, $integer / $numeral_num);
                $integer = $integer % $numeral_num;
            }
        } 
    
        return $res; 
    } 

    /**
     * Gets the name of the converter
     * 
     * @return string
     */
    public static function getName() : string
    {
        return 'roman-numeral';
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
