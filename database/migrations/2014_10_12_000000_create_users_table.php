<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name',150)->nullable();
            $table->string('email')->unique();
            $table->bigInteger('phone')->nullable()->unique();
            $table->string('state',250);
            $table->string('referrer_code');
            $table->string('referral_code')->nullable();
            $table->string('password');
            $table->enum('is_verified', [1, 0])->nullable()->default(1);
            $table->enum('delete_status', [1, 0])->nullable()->default(0);
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
        Schema::dropIfExists('users');
    }
}
