<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTestPretensionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pretensions', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('branch_id')->unsigned();
            $table->integer('policy_id')->unsigned();
            $table->enum('status', ['in_progress', 'refused', 'accepted']);
            $table->integer('case_number')->unsigned();
            $table->float('actually_paid', 12, 3)->unsigned()->nullable();
            $table->date('last_payment_date')->nullable();
            $table->float('franchise_sum', 12, 3)->nullable();
            $table->float('franchise_percent', 6, 3)->unsigned()->nullable();
            $table->string('reinsurance', 50)->nullable();
            $table->date('statement_date')->nullable();
            $table->date('insured_event_date')->nullable();
            $table->string('event_description', 100)->nullable();
            $table->string('object_description', 100)->nullable();
            $table->string('region', 100)->nullable();
            $table->string('district', 100)->nullable();
            $table->string('claimed_loss_sum', 100)->nullable();
            $table->string('refund_paid_sum', 100)->nullable();
            $table->string('currency_exchange_rate', 100)->nullable();
            $table->date('datepayment_compensation_date')->nullable();
            $table->date('final_settlement_date')->nullable();
            $table->timestamps();
            $table->timestamp('deleted_at')->nullable();
            $table->foreign('branch_id', 'fk_pretension_branch')->references('id')->on('branches');
            $table->foreign('policy_id', 'fk_pretension_policy')->references('id')->on('policies');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pretensions');
    }
}
