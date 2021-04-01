<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAccompanyingPeopleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('accompanying_people', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("cargo_infos_id");
            $table->foreign('cargo_infos_id')
                ->references('id')
                ->on('cargo_infos');
            $table->string('fio_accompanying')->nullable();
            $table->string('position_accompanying')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('accompanying_people');
    }
}
