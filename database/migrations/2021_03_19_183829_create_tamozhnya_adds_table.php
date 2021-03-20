<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTamozhnyaAddsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tamozhnya_adds', function (Blueprint $table) {
            $table->id();
            $table->date('from_date');
            $table->date('to_date');
            $table->string('warehouse_volume')->nullable();
            $table->string('product_volume')->nullable();
            $table->string('product_volume_unit')->nullable();
            $table->string('total_sum')->nullable();
            $table->date('na_sklade_from_date')->nullable();
            $table->date('na_sklade_to_date')->nullable();

            $table->string('payment_term');
            $table->string('currencies')->nullable();
            $table->integer('sposob_rascheta')->nullable();
            $table->string('strahovaya_sum');
            $table->text('strahovaya_purpose')->nullable();
            $table->string('franshiza')->nullable();

            $table->string('serial_number_policy')->nullable();
            $table->date('date_issue_policy')->nullable();

            $table->integer('otvet_litso')->index();
            $table->integer('policy_holder_id')->index();
            $table->integer('policy_beneficiary_id')->index();

            $table->string('anketa_img')->nullable();
            $table->string('dogovor_img')->nullable();
            $table->string('polis_img')->nullable();
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
        Schema::dropIfExists('tamozhnya_adds');
    }
}
