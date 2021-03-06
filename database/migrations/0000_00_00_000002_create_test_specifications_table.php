<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTestSpecificationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('specifications', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('type_id')->unsigned();
            $table->string('key', 20)->unique();
            $table->string('code', 3);
            $table->string('name', 255);
            $table->tinyInteger('is_for_individual')->unsigned()->default(0);
            $table->tinyInteger('is_for_legal')->unsigned()->default(0);
            $table->float('tariff', 4, 2)->unsigned()->nullable();
            $table->integer('max_acceptable_amount')->unsigned()->nullable();
            $table->timestamps();
            $table->timestamp('deleted_at')->nullable();
            $table->foreign('type_id', 'fk_specification_type')->references('id')->on('types');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('specifications');
    }
}
