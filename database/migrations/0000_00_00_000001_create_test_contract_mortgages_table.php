<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTestContractMortgagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contract_mortgages', function (Blueprint $table) {
            $table->increments('id');
            $table->string('agreement_number', 45);
            $table->date('agreement_date');
            $table->string('between_agreement_number', 45);
            $table->date('between_agreement_date');
            $table->date('period_from');
            $table->date('period_to');
            $table->string('evaluation_basis', 45);
            $table->string('geo_zone', 45);
            $table->string('property_name', 45);
            $table->string('fire_certificate_path')->nullable();
            $table->string('security_certificate_path')->nullable();
            $table->float('franchise_earthquake_fire_percent', 6, 3)->nullable();
            $table->float('franchise_illegal_action_percent', 6, 3)->nullable();
            $table->float('franchise_other_risks_percent', 6, 3)->nullable();
            $table->timestamps();
            $table->timestamp('deleted_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('contract_mortgages');
    }
}
