<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTestContractConstructionInstallationWorksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contract_construction_installation_works', function (Blueprint $table) {
            $table->increments('id');
            $table->string('object', 45);
            $table->string('location', 45);
            $table->string('description');
            $table->string('short_description')->nullable();
            $table->string('injures');
            $table->string('material_damage');
            $table->set('location_specificity', ['motorways', 'bridges_overpasses', 'pipelines', 'railways', 'dams_embankments', 'land_paths', 'waterways', 'car_parks', 'power_lines', 'land_lines', 'underground_lines', 'underground_cables'])->nullable();
            $table->string('distance', 45)->nullable();
            $table->text('construction_work_description')->nullable();
            $table->string('basement')->nullable();
            $table->string('maximum_excavation_depth')->nullable();
            $table->string('losses_description')->nullable();
            $table->string('fence_description')->nullable();
            $table->string('security_fio', 45)->nullable();
            $table->enum('security_schedule', ['fulltime', 'at_day', 'at_night', 'at_weekend'])->nullable();
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
        Schema::dropIfExists('contract_construction_installation_works');
    }
}
