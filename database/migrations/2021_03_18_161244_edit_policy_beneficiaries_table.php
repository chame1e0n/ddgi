<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class EditPolicyBeneficiariesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('policy_beneficiaries', function (Blueprint $table) {
            $table->string('seria_passport')->nullable();
            $table->string('nomer_passport')->nullable();
            $table->string('telephone')->nullable();
            $table->string('oked')->nullable();
            $table->string('okonx')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('policy_beneficiaries', function (Blueprint $table) {
            $table->dropColumn('seria_passport');
            $table->dropColumn('nomer_passport');
            $table->dropColumn('telephone');
            $table->dropColumn('oked');
        });
    }
}
