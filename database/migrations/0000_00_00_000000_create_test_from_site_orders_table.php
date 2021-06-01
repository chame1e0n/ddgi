<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTestFromSiteOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('from_site_orders', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('order_id')->unsigned();
            $table->string('title', 200)->nullable();
            $table->string('object_title', 200)->nullable();
            $table->string('status', 50)->nullable();
            $table->integer('amount')->nullable();
            $table->string('prize', 100)->nullable();
            $table->timestamp('timestamp')->nullable();
            $table->timestamp('term')->nullable();
            $table->string('inventory_number', 100)->nullable();
            $table->string('total_area', 100)->nullable();
            $table->string('city_property', 100)->nullable();
            $table->string('street', 100)->nullable();
            $table->string('type_property', 100)->nullable();
            $table->string('matches_registration_address', 100)->nullable();
            $table->string('username', 100)->nullable();
            $table->string('first_name', 100)->nullable();
            $table->string('last_name', 100)->nullable();
            $table->string('middle_name', 100)->nullable();
            $table->tinyInteger('is_active')->unsigned()->default(0);
            $table->string('avatar_path', 100)->nullable();
            $table->date('birthdate')->nullable();
            $table->string('serial_number', 100)->nullable();
            $table->string('passport_number', 100)->nullable();
            $table->date('date_issue')->nullable();
            $table->string('issued_by', 100)->nullable();
            $table->string('phone', 100)->nullable();
            $table->string('email_index', 100)->nullable();
            $table->string('city', 100)->nullable();
            $table->string('district', 100)->nullable();
            $table->string('user_street', 100)->nullable();
            $table->string('apartment_number', 100)->nullable();
            $table->string('home_number', 100)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('from_site_orders');
    }
}
