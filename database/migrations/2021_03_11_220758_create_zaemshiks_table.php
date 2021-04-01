<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateZaemshiksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('zaemshiks', function (Blueprint $table) {
            $table->id();
            $table->string("FIO");
            $table->string("address");
            $table->string("tel");
            $table->string("passport");
            $table->string("passport_num");
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
        Schema::dropIfExists('zaemshiks');
    }
}
