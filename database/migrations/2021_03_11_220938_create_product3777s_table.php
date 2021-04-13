<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProduct3777sTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
//        Schema::create('product3777s', function (Blueprint $table) {
//            $table->id();
//            $table->unsignedBigInteger("policy_holder_id");
////            $table->foreign('policy_holder_id')
////                ->references('id')->on('policy_holders');
//            $table->unsignedBigInteger("zaemshik_id");
//            $table->foreign('zaemshik_id')
//                ->references('id')->on('zaemshiks');
//            $table->string("dogovor_lizing_num");
//            $table->date("insurance_from");
//            $table->date("insurance_to");
//            $table->string("insurance_aim");
//            $table->string("insurance_sum");
//            $table->string("currency");
//            $table->string("franshiza");
//            $table->date("object_from_date");
//            $table->date("object_to_date");
//            $table->string("other_info");
//            $table->string("insurance_total_sum");
//            $table->string("insurance_gift");
//            $table->string("payment_currency");
//            $table->string("payment_term");
//            $table->string("polis_series");
//            $table->date("polis_from");
//            $table->string("litso");
//            $table->string("passport_copy");
//            $table->string("dogovor_copy");
//            $table->string("spravka_copy");
//            $table->string("other");
//            $table->timestamps();
//        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('product3777s');
    }
}
