<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTestPretensionOverviewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pretension_overviews', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('employee_id')->unsigned();
            $table->integer('pretension_id')->unsigned();
            $table->tinyInteger('is_passed')->unsigned()->default(0);
            $table->string('comment', 250)->nullable();
            $table->timestamps();
            $table->timestamp('deleted_at')->nullable();
            $table->foreign('employee_id', 'fk_pretension_overview_employee')->references('id')->on('employees');
            $table->foreign('pretension_id', 'fk_pretension_overview_pretension')->references('id')->on('pretensions');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pretension_overviews');
    }
}
