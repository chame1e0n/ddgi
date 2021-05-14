<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFieldAdministrativeCase extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('otvetstvennost_otsenshiki', function (Blueprint $table) {
            $table->string('administrative_case')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('otvetstvennost_otsenshiki', function (Blueprint $table) {
            $table->dropColumn('administrative_case');
        });
    }
}
