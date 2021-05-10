<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFieldAllProductInformatopnTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('all_product_information', function (Blueprint $table) {
            $table->text('policy_number')->nullable();
            $table->text('god_vipuska')->nullable();

            $table->text('policy_insurance_to')->nullable();
            $table->text('marka')->nullable();
            $table->text('model')->nullable();
            $table->text('modification')->nullable();
            $table->text('gos_nomer')->nullable();
            $table->text('tex_passport')->nullable();

            $table->text('number_engine')->nullable();
            $table->text('number_kuzov')->nullable();
            $table->text('gryzopodemnost')->nullable();
            $table->text('strah_stoimost')->nullable();
            $table->text('strah_sum')->nullable();
            $table->text('strah_prem')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
