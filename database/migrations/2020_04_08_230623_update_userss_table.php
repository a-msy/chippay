<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateUserssTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            //
            $table->string('paypay')->nullable();
            $table->string('kyash')->nullable();
            $table->string('paypal')->nullable();
            $table->string('bitcoin')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            //
            $table->dropColumn('paypay');
            $table->dropColumn('kyash');
            $table->dropColumn('paypal');
            $table->dropColumn('bitcoin');
        });
    }
}
