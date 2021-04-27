<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAllProductImushestvoInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('all_product_imushestvo_infos', function (Blueprint $table) {
            $table->id();
            $table->integer('all_product_id');
            $table->text('name_property');
            $table->text('place_property');
            $table->date('date_of_issue_property');
            $table->text('count_property');
            $table->text('units_property');
            $table->text('insurance_cost');
            $table->text('insurance_sum');
            $table->text('insurance_premium');
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
        Schema::dropIfExists('all_product_imushestvo_infos');
    }
}
