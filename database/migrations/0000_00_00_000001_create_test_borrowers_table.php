<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTestBorrowersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('borrowers', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('bank_id')->unsigned();
            $table->string('fio', 250)->nullable();
            $table->string('address', 150)->nullable();
            $table->string('phone', 50)->nullable();
            $table->string('bank_account', 50)->nullable();
            $table->string('inn', 50)->nullable();
            $table->string('mfo', 50)->nullable();
            $table->string('okonh')->nullable();
            $table->string('oked')->nullable();
            $table->string('passport_series')->nullable();
            $table->string('passport_number')->nullable();
            $table->string('passport_issued_place')->nullable();
            $table->date('passport_issued_date')->nullable();
            $table->timestamps();
            $table->timestamp('deleted_at')->nullable();
            $table->foreign('bank_id', 'fk_borrower_bank')->references('id')->on('banks');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('borrowers');
    }
}
