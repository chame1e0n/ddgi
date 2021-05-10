<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnPolicyHolder extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('policy_holders', function (Blueprint $table) {
            $table->string('passport_series')->nullable();
            $table->string('passport_number')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('policy_holders', function (Blueprint $table) {
            $table->dropColumn('passport_series');
            $table->dropColumn('passport_number');
        });
    }
}
