<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTestPolicySportsmansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('policy_sportsmans', function (Blueprint $table) {
            $table->increments('id');
            $table->string('fio', 45);
            $table->date('birthdate');
            $table->string('sport', 45);
            $table->integer('traumatic_quantity')->nullable();
            $table->float('traumatic_sum', 12, 3)->unsigned()->nullable();
            $table->float('traumatic_premium', 12, 3)->unsigned()->nullable();
            $table->float('death_sum', 12, 3)->unsigned()->nullable();
            $table->float('death_premium', 12, 3)->unsigned()->nullable();
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
        Schema::dropIfExists('policy_sportsmans');
    }
}
