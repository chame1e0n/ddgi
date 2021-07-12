<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTestPolicyAccidentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('policy_accidents', function (Blueprint $table) {
            $table->increments('id');
            $table->string('fio', 45);
            $table->date('birthdate');
            $table->string('passport_series', 45);
            $table->string('passport_number', 45);
            $table->string('beneficiary', 45);
            $table->tinyInteger('is_chronic_disease')->unsigned()->default(0);
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
        Schema::dropIfExists('policy_accidents');
    }
}
