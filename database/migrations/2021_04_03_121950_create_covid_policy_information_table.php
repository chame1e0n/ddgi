<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCovidPolicyInformationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('covid_policy_information', function (Blueprint $table) {
            $table->id();
            $table->integer('covid_id');
            $table->string('person_name');
            $table->string('person_surname');
            $table->string('person_lastname');
            $table->string('series_and_number_passport');
            $table->string('place_of_issue_passport');
            $table->date('date_of_issue_passport');
            $table->integer('policy_series_id');

            $table->integer('insurance_cost');
            $table->integer('insurance_sum');
            $table->integer('insurance_premium');

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
        Schema::dropIfExists('covid_policy_information');
    }
}
