<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTestReinsuranceOverviewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reinsurance_overviews', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('employee_id')->unsigned();
            $table->integer('reinsurance_id')->unsigned();
            $table->tinyInteger('is_approved')->unsigned()->default(0);
            $table->text('comment')->nullable();
            $table->timestamps();
            $table->timestamp('deleted_at')->nullable();
            $table->foreign('employee_id', 'fk_reinsurance_overview_employee')->references('id')->on('employees');
            $table->foreign('reinsurance_id', 'fk_reinsurance_overview_reinsurance')->references('id')->on('reinsurances');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('reinsurance_overviews');
    }
}
