<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddPolicyHoldersOgrn extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('policy_holders', function (Blueprint $table) {
            $table->string('oked')->nullable();
            $table->string('okonx')->nullable()->change();
        });
      Schema::table('zaemshiks', function (Blueprint $table) {
          $table->string('z_oked')->nullable();
          $table->string('z_okonx')->nullable()->change();
      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('policy_holders', function (Blueprint $table) {
            $table->dropColumn('oked');
        });
        Schema::table('zaemshiks', function (Blueprint $table) {
            $table->dropColumn('z_oked');
        });
    }
}
