<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddAdditionalFieldsToAllProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('all_products', function (Blueprint $table) {
            $table->text('dogovor_lizing_number')->nullable();
            $table->date('dogovor_period_from')->nullable();
            $table->date('dogovor_period_to')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('all_products', function (Blueprint $table) {
            //
        });
    }
}
