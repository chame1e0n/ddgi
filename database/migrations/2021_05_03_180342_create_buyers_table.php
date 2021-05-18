<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBuyersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('buyers', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("all_products_id");
            $table->string('field_of_activity')->nullable();
            $table->string('address')->nullable();
            $table->string('email_address')->nullable();
            $table->string('telephone')->nullable();
            $table->string('checking_account')->nullable();
            $table->string('inn')->nullable();
            $table->string('mfo')->nullable();
            $table->string('bank')->nullable();
            $table->string('oked')->nullable();
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
        Schema::dropIfExists('buyers');
    }
}
