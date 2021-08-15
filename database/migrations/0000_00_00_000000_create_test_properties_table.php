<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTestPropertiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('properties', function (Blueprint $table) {
            $table->increments('id');
            $table->morphs('model');
            $table->string('inventory_number', 100)->nullable();
            $table->string('name', 45);
            $table->string('location', 100);
            $table->date('issue_date')->nullable();
            $table->float('quantity', 12, 3)->unsigned()->nullable();
            $table->enum('measure', ['m_2', 'sm_2'])->nullable();
            $table->float('insurance_value', 12, 3)->unsigned();
            $table->float('insurance_sum', 12, 3)->unsigned();
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
        Schema::dropIfExists('properties');
    }
}
