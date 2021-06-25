<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTestEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('branch_id')->unsigned();
            $table->integer('user_id')->unsigned();
            $table->enum('role', ['admin', 'agent', 'director', 'manager']);
            $table->string('name', 150);
            $table->string('surname', 150);
            $table->string('middlename', 150);
            $table->date('birthdate');
            $table->string('passport_series', 50);
            $table->string('passport_number', 50);
            $table->date('work_start_date')->nullable();
            $table->date('work_end_date')->nullable();
            $table->string('phone', 70);
            $table->string('address', 250);
            $table->timestamps();
            $table->timestamp('deleted_at')->nullable();
            $table->foreign('branch_id', 'fk_employee_branch')->references('id')->on('branches');
            $table->foreign('user_id', 'fk_employee_user')->references('id')->on('users');
        });

        Schema::table('branches', function (Blueprint $table) {
            $table->foreign('director_id', 'fk_branch_employee')->references('id')->on('employees');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('branches', function (Blueprint $table) {
            $table->dropForeign('fk_branch_employee');
        });

        Schema::dropIfExists('employees');
    }
}
