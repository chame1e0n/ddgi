<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTestContractCargosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contract_cargos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('delivery_number', 45);
            $table->date('delivery_date');
            $table->string('address_from', 45);
            $table->string('address_to', 45);
            $table->string('geo_zone', 45);
            $table->string('transshipment', 45);
            $table->string('insurance_country', 45);
            $table->string('location', 45);
            $table->string('name', 45);
            $table->string('type', 45);
            $table->string('package', 45);
            $table->float('weight', 12, 3)->unsigned();
            $table->integer('quantity')->unsigned();
            $table->string('transport', 45);
            $table->string('features')->nullable();
            $table->integer('cargo_place_quantity')->unsigned()->nullable();
            $table->string('carrier', 45);
            $table->string('sender_name', 45);
            $table->string('sender_address', 45);
            $table->string('recipient_name', 45);
            $table->string('recipient_address', 45);
            $table->date('insurance_period_from');
            $table->date('insurance_period_to');
            $table->date('package_period_from');
            $table->date('package_period_to');
            $table->enum('insurance_conditions', ['no', 'all_risks', 'private_accident', 'only_crash']);
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
        Schema::dropIfExists('contract_cargos');
    }
}
