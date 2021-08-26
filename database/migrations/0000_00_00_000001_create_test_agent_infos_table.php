<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTestAgentInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('agent_infos', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('bank_id')->unsigned();
            $table->string('company');
            $table->string('bank_account', 50);
            $table->string('inn', 50);
            $table->string('mfo', 50);
            $table->string('oked')->nullable();
            $table->string('okonh')->nullable();
            $table->string('agreement_number', 45);
            $table->date('agreement_date');
            $table->string('patent_number', 45)->nullable();
            $table->date('patent_from')->nullable();
            $table->date('patent_to')->nullable();
            $table->string('comment');
            $table->timestamps();
            $table->timestamp('deleted_at')->nullable();
            $table->foreign('bank_id', 'fk_agent_info_bank')->references('id')->on('banks');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('agent_infos');
    }
}
