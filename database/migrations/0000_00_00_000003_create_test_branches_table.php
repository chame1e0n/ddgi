<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTestBranchesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('branches', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('director_id')->unsigned()->nullable();
            $table->integer('parent_id')->unsigned()->nullable();
            $table->integer('region_id')->unsigned();
            $table->string('name', 150);
            $table->tinyInteger('is_center')->unsigned()->nullable()->default(0);
            $table->date('founded_date');
            $table->string('address', 150);
            $table->string('phone_number', 50);
            $table->timestamps();
            $table->timestamp('deleted_at')->nullable();
            $table->foreign('parent_id', 'fk_branch_branch')->references('id')->on('branches');
            $table->foreign('region_id', 'fk_branch_region')->references('id')->on('regions');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('branches');
    }
}
