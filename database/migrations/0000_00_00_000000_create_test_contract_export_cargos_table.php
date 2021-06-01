<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTestContractExportCargosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contract_export_cargos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('insurance_agreement_number', 45);
            $table->date('insurance_agreement_date');
            $table->date('period_from');
            $table->date('period_to');
            $table->enum('waiting_period', ['30', '180', '300'])->nullable();
            $table->string('agreement_goods_list')->nullable();
            $table->enum('agreement_goods_type', ['standard', 'order'])->nullable();
            $table->string('failuer_reason')->nullable();
            $table->string('insurance_country', 45);
            $table->date('shipping_date');
            $table->float('shipped_goods_value', 12, 3)->unsigned();
            $table->float('shipped_goods_paid', 12, 3)->unsigned()->nullable();
            $table->float('buyer_debt', 12, 3)->unsigned()->nullable();
            $table->date('summary_date')->nullable();
            $table->float('overdue_amount_1_60', 12, 3)->unsigned()->nullable();
            $table->float('overdue_amount_60_180', 12, 3)->unsigned()->nullable();
            $table->string('reason_description')->nullable();
            $table->float('paid_insurance_premium', 12, 3)->unsigned()->nullable();
            $table->float('penalty', 12, 3)->unsigned()->nullable();
            $table->float('shipped_goods_payment', 12, 3)->unsigned()->nullable();
            $table->float('unshipped_goods_payment', 12, 3)->unsigned()->nullable();
            $table->float('other_expenses', 12, 3)->unsigned()->nullable();
            $table->string('invoices')->nullable();
            $table->string('company_experience', 45)->nullable();
            $table->string('credit_letter_bank_open', 45)->nullable();
            $table->string('credit_letter_bank_confirm', 45)->nullable();
            $table->float('credit_letter_sum', 12, 3)->unsigned()->nullable();
            $table->string('credit_letter_form', 45)->nullable();
            $table->string('credit_letter_view', 45)->nullable();
            $table->tinyInteger('is_no_disputes')->unsigned()->default(0);
            $table->tinyInteger('is_no_commit')->unsigned()->default(0);
            $table->tinyInteger('is_follow')->unsigned()->default(0);
            $table->tinyInteger('is_guarantee')->unsigned()->default(0);
            $table->tinyInteger('is_paid_to_policyholder')->unsigned()->default(0);
            $table->tinyInteger('is_an_obligation')->unsigned()->default(0);
            $table->tinyInteger('is_agree_to_provide_info')->unsigned()->default(0);
            $table->string('completed_sales_reason')->nullable();
            $table->tinyInteger('is_extended_changed')->unsigned()->default(0);
            $table->tinyInteger('is_have_info')->unsigned()->default(0);
            $table->tinyInteger('is_have_ensuring_forms')->unsigned()->default(0);
            $table->tinyInteger('is_required')->unsigned()->default(0);
            $table->tinyInteger('is_received')->unsigned()->default(0);
            $table->tinyInteger('is_realible')->unsigned()->default(0);
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
        Schema::dropIfExists('contract_export_cargos');
    }
}
