<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTestPledgersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pledgers', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('bank_id')->unsigned();
            $table->string('fio', 250)->nullable();
            $table->string('address', 150)->nullable();
            $table->string('phone', 50)->nullable();
            $table->string('bank_account', 50)->nullable();
            $table->string('inn', 50)->nullable();
            $table->string('mfo', 50)->nullable();
            $table->string('oked')->nullable();
            $table->timestamps();
            $table->timestamp('deleted_at')->nullable();
            $table->foreign('bank_id', 'fk_pledger_bank')->references('id')->on('banks');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pledgers');
    }
}
