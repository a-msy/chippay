<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdminsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admins', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->longText('about')->nullable();
            $table->longText('back')->nullable();
            $table->string('paypay')->nullable();
            $table->string('kyash')->nullable();
            $table->string('paypal')->nullable();
            $table->string('bitcoin')->nullable();
            $table->integer('public')->default(0);
            $table->bigInteger('auth')->nullable()->default(0);
            $table->bigInteger('point')->default(0);
            $table->rememberToken();
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
        Schema::dropIfExists('admins');
    }
}
