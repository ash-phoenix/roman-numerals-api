<?php

namespace App\Http\Requests;

use App\Services\IntegerConverter\Factory;

/**
 * Request model for handing integer conversion routes
 * 
 * @category Request
 * @package  RomanNumeralsApi
 * @author   Ash Phoenix <ashleyphoenix@ymail.com>
 * @license  https://opensource.org/licenses/GPL-3.0 GNU Public License
 * @link     https://github.com/netsells/roman-numerals-api
 */
class IntegerConversionRequest extends \Illuminate\Foundation\Http\FormRequest
{
    /**
     * Converter type factory
     *
     * @var Factory
     */
    protected $converter_factory;

    /**
     * Sets controller depedencies
     * 
     * @param Factory $converter_factory Converter type factory
     */
    public function __construct(Factory $converter_factory)
    {
        $this->converter_factory = $converter_factory;
    }

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @throws IntegerConverterNotFoundException
     *
     * @return array
     */
    public function rules()
    {
        $converter = $this->converter_factory->getFromType($this->type);

        return [
            'type' => 'required|string',
            'integer' => $converter->getIntegerRules()
        ];
    }
}
