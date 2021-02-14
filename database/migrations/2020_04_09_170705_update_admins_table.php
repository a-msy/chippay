<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateAdminsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('admins', function (Blueprint $table) {
            //
            $table->text('phone')->nullable();
            $table->text('addr')->nullable();
            $table->text('shopname')->nullable();
            $table->integer('takeout')->default(0);
            $table->text('hp')->nullable();
            $table->text('yasumi')->nullable();
            $table->text('time')->nullable();
            $table->integer('park')->default(0);
            $table->text('area')->nullable();
            $table->text('pay')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('admins', function (Blueprint $table) {
            //
            $table->dropColumn('phone');
            $table->dropColumn('addr');
            $table->dropColumn('shopname');
            $table->dropColumn('takeout');
            $table->dropColumn('hp');
            $table->dropColumn('yasumi');
            $table->dropColumn('time');
            $table->dropColumn('park');
            $table->dropColumn('area');
            $table->dropColumn('pay');
        });
    }
}
