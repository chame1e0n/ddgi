<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBondedPolicyInformationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bonded_policy_informations', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('bonded_id');
            $table->unsignedInteger('policy_series_id');
            $table->unsignedInteger('user_id');
            $table->date('from_date');
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
        Schema::dropIfExists('bonded_policy_informations');
    }
}
