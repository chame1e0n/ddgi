<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTestPolicyCovidsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('policy_covids', function (Blueprint $table) {
            $table->id();
            $table->string('name', 45);
            $table->string('surname', 45);
            $table->string('middlename', 45);
            $table->string('passport', 45);
            $table->date('passport_issue_date');
            $table->string('passport_issue_place', 45);
            $table->float('insurance_value', 32, 2)->unsigned();
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
        Schema::dropIfExists('policy_covids');
    }
}
