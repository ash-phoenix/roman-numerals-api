<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * Migration for creating the integer_conversions table
 * 
 * @category Migration
 * @package  RomanNumeralsApi
 * @author   Ash Phoenix <ashleyphoenix@ymail.com>
 * @license  https://opensource.org/licenses/GPL-3.0 GNU Public License
 * @link     https://github.com/netsells/roman-numerals-api
 */
class CreateIntegerConversionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('integer_conversions', function (Blueprint $table) {
            $table->id();
            $table->string('conversion_type');
            $table->integer('from');
            $table->string('to');
            $table->integer('hits')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('integer_conversions');
    }
}
