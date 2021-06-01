<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTestClientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clients', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('bank_id')->unsigned();
            $table->string('fio', 250);
            $table->string('address', 150);
            $table->string('email', 45)->nullable();
            $table->string('phone', 50);
            $table->string('bank_account', 50);
            $table->string('inn', 50);
            $table->string('mfo', 50);
            $table->string('okonh')->nullable();
            $table->string('oked')->nullable();
            $table->string('activity')->nullable();
            $table->text('info')->nullable();
            $table->string('passport_series')->nullable();
            $table->string('passport_number')->nullable();
            $table->timestamps();
            $table->timestamp('deleted_at')->nullable();
            $table->foreign('bank_id', 'fk_client_bank')->references('id')->on('banks');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('clients');
    }
}
