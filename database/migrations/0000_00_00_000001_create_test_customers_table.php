<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTestCustomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('bank_id')->unsigned();
            $table->string('activity_field', 45);
            $table->string('address', 150);
            $table->string('post', 150);
            $table->string('phone', 50);
            $table->string('bank_account', 50);
            $table->string('inn', 50);
            $table->string('mfo', 50);
            $table->string('oked')->nullable();
            $table->timestamps();
            $table->timestamp('deleted_at')->nullable();
            $table->foreign('bank_id', 'fk_customer_bank')->references('id')->on('banks');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('customers');
    }
}
