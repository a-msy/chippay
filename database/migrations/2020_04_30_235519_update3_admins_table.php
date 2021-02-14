<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Update3AdminsTable extends Migration
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
            /*
             * １：中華
             * ２：和食
             * ３：イタリアン
             * ４：フレンチ
             * ０：その他
             * */
            $table->integer('genre')->default(1);

            /*
             * 提供しているメイン料理一つ
             * */
            $table->text('maindish')->nullable();
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
            $table->dropColumn('genre');
            $table->dropColumn('maindish');
        });
    }
}
