<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnZalogAllProducts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('all_products', function (Blueprint $table) {
            $table->integer('zalogodatel_id')->nullable(); // Ид залогодателя
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('all_products', function (Blueprint $table) {
            $table->dropColumn('zalogodatel_id'); // Ид залогодателя
        });
    }
}
