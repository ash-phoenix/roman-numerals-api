<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

/**
 * Factory for integer converters
 * 
 * @category Resource
 * @package  RomanNumeralsApi
 * @author   Ash Phoenix <ashleyphoenix@ymail.com>
 * @license  https://opensource.org/licenses/GPL-3.0 GNU Public License
 * @link     https://github.com/netsells/roman-numerals-api
 */
class IntegerConversionResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param \Illuminate\Http\Request $request Current request
     *
     * @return array
     */
    public function toArray($request)
    {
        return [
            'conversion_type' => $this->conversion_type,
            'from' => $this->from,
            'to' => $this->to,
            'hits' => $this->hits
        ];
    }
}
