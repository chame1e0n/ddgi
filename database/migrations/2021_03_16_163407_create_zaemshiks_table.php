<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateZaemshiksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('zaemshiks', function (Blueprint $table) {
            $table->id();
            $table->string('z_fio');
            $table->string('z_address');
            $table->string('z_phone');
            $table->string('passport_series');
            $table->string('passport_number');
            $table->string('passport_issued');
            $table->date('passport_when_issued');
            $table->string('z_checking_account');
            $table->string('z_inn');
            $table->string('z_mfo');
            $table->integer('bank_id');
            $table->string('z_okonx');
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
        Schema::dropIfExists('zaemshiks');
    }
}
