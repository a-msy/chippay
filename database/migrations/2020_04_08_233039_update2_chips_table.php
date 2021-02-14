<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Update2ChipsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('chips', function (Blueprint $table) {
            //
            $table->longText('comment')->change();
            $table->longText('kind_of_back')->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('chips', function (Blueprint $table) {
            //
            $table->dropColumn('comment');
            $table->dropColumn('kind_of_back');
        });
    }
}
