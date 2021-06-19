<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTestRequestOverviewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('request_overviews', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('employee_id')->unsigned();
            $table->integer('request_id')->unsigned();
            $table->tinyInteger('is_passed')->unsigned()->default(0);
            $table->text('comment');
            $table->timestamps();
            $table->timestamp('deleted_at')->nullable();
            $table->foreign('employee_id', 'fk_request_overview_employee')->references('id')->on('employees');
            $table->foreign('request_id', 'fk_request_overview_request')->references('id')->on('requests');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('request_overviews');
    }
}
