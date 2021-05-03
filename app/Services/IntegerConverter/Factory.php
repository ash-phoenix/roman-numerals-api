<?php

namespace App\Services\IntegerConverter;

use App\Services\IntegerConverter\Converters\RomanNumeral;
use App\Services\IntegerConverter\Converters\Binary;
use App\Services\IntegerConverter\Converters\Hex;
use App\Services\IntegerConverter\Converters\Words;
use App\Services\IntegerConverter\Converters\ConverterInterface;
use App\Exceptions\IntegerConverterNotFoundException;

/**
 * Factory for integer converters
 * 
 * @category Service
 * @package  RomanNumeralsApi
 * @author   Ash Phoenix <ashleyphoenix@ymail.com>
 * @license  https://opensource.org/licenses/GPL-3.0 GNU Public License
 * @link     https://github.com/netsells/roman-numerals-api
 */
class Factory
{
    /**
     * @var array A list of the available converters
     */
    private array $converters = [
        RomanNumeral::class,
        Binary::class,
        Hex::class,
        Words::class
    ];

    /**
     * Validates that a converter exists for passed-in type
     * 
     * @param string $type The converter type to validate
     *
     * @return bool
     */
    public function validateType(string $type) : bool
    {
        try {
            $this->getFromType($type);
        } catch (IntegerConverterNotFoundException $e) {
            return false;
        }

        return true;
    }

    /**
     * Validates that a converter exists for passed-in type
     * 
     * @param string $type The converter type to validate
     *
     * @throws IntegerConverterNotFoundException
     *
     * @return bool
     */
    public function getFromType(string $type) : ConverterInterface
    {
        foreach ($this->converters as $converter) {
            if ($converter::getName() === $type) {
                return new $converter;
            }
        }

        throw new IntegerConverterNotFoundException;
    }
}
