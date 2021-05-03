<?php

namespace App\Http\Controllers\Api;

use App\Models\IntegerConversion;
use App\Http\Resources\IntegerConversionResource;
use App\Services\IntegerConverter\Factory;
use Illuminate\Http\Resources\Json\ResourceCollection;
use App\Http\Requests\IntegerConversionRequest;

/**
 * Controller for handling integer conversions
 * 
 * @category Controller
 * @package  RomanNumeralsApi
 * @author   Ash Phoenix <ashleyphoenix@ymail.com>
 * @license  https://opensource.org/licenses/GPL-3.0 GNU Public License
 * @link     https://github.com/netsells/roman-numerals-api
 */
class IntegerConversionController extends \App\Http\Controllers\Controller
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
     * Gets the latest integer conversions
     *
     * @param string $type (optional) Filter by conversion type
     *
     * @throws IntegerConverterNotFoundException
     * @return ResourceCollection
     */
    public function latest(string $type = null) : ResourceCollection
    {
        if ($type) {
            $this->converter_factory->validateType($type);
            $query = IntegerConversion::latestByConversionType($type);
        } else {
            $query = IntegerConversion::latest();
        }

        $integer_conversions = $query->paginate();
        return IntegerConversionResource::collection($integer_conversions);
    }

    /**
     * Gets the most popular integer conversions
     *
     * @param string $type (optional) Filter by conversion type
     *
     * @throws IntegerConverterNotFoundException
     * @return ResourceCollection
     */
    public function popular(string $type = null) : ResourceCollection
    {
        if ($type) {
            $this->converter_factory->validateType($type);
            $query = IntegerConversion::popularByConversionType($type);
        } else {
            $query = IntegerConversion::popular();
        }

        $integer_conversions = $query->take(10)->get();
        return IntegerConversionResource::collection($integer_conversions);
    }

    /**
     * Stores an integer conversion
     * 
     * @param IntegerConversionRequest $request The request object
     * 
     * @throws IntegerConverterNotFoundException
     * @return IntegerConversionResource
     */
    public function store(IntegerConversionRequest $request) : IntegerConversionResource
    {
        $converter = $this->converter_factory->getFromType($request->type);
        $integer_conversion = IntegerConversion::firstOrNew(
            [
                'conversion_type' => $converter->getName(),
                'from' => $request->integer
            ],
            ['hits' => 1]
        );

        if ($integer_conversion->exists) {
            $integer_conversion->hits++;
        } else {
            $integer_conversion->to = $converter->convertInteger($request->integer);
        }

        $integer_conversion->save();
        return new IntegerConversionResource($integer_conversion);
    }
}
