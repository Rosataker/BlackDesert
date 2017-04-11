<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddRawMaterialToProfitConversionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('ProfitConversion', function (Blueprint $table) {
            $table->text('rawmaterial');   
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('ProfitConversion', function (Blueprint $table) {
            Schema::drop('ProfitConversion');
        });
    }
}
