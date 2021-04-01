<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCargoInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cargo_infos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("policy_holder_id");
            $table->unsignedBigInteger("policy_beneficiary_id");
//            $table->foreign('policy_beneficiary_id')
//                ->references('id')
//                ->on('policy_beneficiaries');
            $table->string('client_type_radio')->nullable();
            $table->string('product_id')->nullable();
            $table->string('dogovor_lizing_num')->nullable();
            $table->date('insurance_from')->nullable();
            $table->string('steamer_point')->nullable();
            $table->string('appointment_point')->nullable();
            $table->string('geo_zone')->nullable();
            $table->string('overloads_place')->nullable();
            $table->string('country_of_insurance')->nullable();
            $table->string('location_of_cargo')->nullable();
            $table->string('name_of_cargo')->nullable();
            $table->string('type_of_cargo')->nullable();
            $table->string('type_packaging')->nullable();
            $table->string('weight_of_cargo')->nullable();
            $table->string('amount_of_cargo')->nullable();
            $table->string('type_of_transport')->nullable();
            $table->string('qualities_of_cargo')->nullable();
            $table->string('fio_accompanying')->nullable();
            $table->string('position_accompanying')->nullable();
            $table->string('amount_of_cargo_place')->nullable();
            $table->string('transporter')->nullable();
            $table->string('name_of_shipper')->nullable();
            $table->string('address_shipper')->nullable();
            $table->string('name_consignee')->nullable();
            $table->string('address_consignee')->nullable();
            $table->date('insurance_period_from')->nullable();
            $table->date('insurance_to')->nullable();
            $table->date('packaging_period_from')->nullable();
            $table->date('packaging_period_to')->nullable();
            $table->string('condition_insurance')->nullable();
            $table->string('accompanying_file')->nullable();
            $table->string('insurance_sum')->nullable();
            $table->string('insurance_bonus')->nullable();
            $table->string('franchise')->nullable();
            $table->string('insurance_premium_currency')->nullable();
            $table->string('payment_term')->nullable();
            $table->string('payment_sum_main')->nullable();
            $table->string('payment_from_main')->nullable();
            $table->string('policy_series')->nullable();
            $table->string('date_giving_insurance')->nullable();
            $table->string('responsible_person')->nullable();
            $table->string('application_form')->nullable();
            $table->string('contract')->nullable();
            $table->string('policy')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cargo_infos');
    }
}
