<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTestConstructionParticipantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('construction_participants', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('contract_construction_installation_work_id')->unsigned();
            $table->string('name');
            $table->timestamps();
            $table->timestamp('deleted_at')->nullable();
            $table->foreign('contract_construction_installation_work_id', 'fk_construction_participant_contract_construction_installation_w')->references('id')->on('contract_construction_installation_works');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('construction_participants');
    }
}
