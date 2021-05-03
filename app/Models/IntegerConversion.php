<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\DB;

/**
 * Model for integer conversions
 * 
 * @category Model
 * @package  RomanNumeralsApi
 * @author   Ash Phoenix <ashleyphoenix@ymail.com>
 * @license  https://opensource.org/licenses/GPL-3.0 GNU Public License
 * @link     https://github.com/netsells/roman-numerals-api
 */
class IntegerConversion extends \Illuminate\Database\Eloquent\Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'conversion_type',
        'from',
        'to',
        'hits'
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    /**
     * Gets the latest integer conversions by conversion_type
     * 
     * @param string $type The conversion type to filter by
     * 
     * @return Builder
     */
    public static function latestByConversionType(string $type) : Builder
    {
        return static::latest()->where('conversion_type', '=', $type);
    }

    /**
     * Gets the most popular integer conversions by conversion_type
     * 
     * @param string $type The conversion type to filter by
     * 
     * @return Builder
     */
    public static function popularByConversionType(string $type) : Builder
    {
        return static::popular()->where('conversion_type', '=', $type);
    }

    /**
     * Gets the most popular integer conversions
     *
     * @return Builder
     */
    public static function popular() : Builder
    {
        return static::orderBy('hits', 'desc');
    }
}
