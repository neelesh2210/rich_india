<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRegistrationErrorLogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('registration_error_logs', function (Blueprint $table) {
            $table->id();
            $table->enum('from', ['cosmofeed', 'website']);
            $table->string('name');
            $table->string('email');
            $table->string('phone');
            $table->string('state');
            $table->string('plan');
            $table->string('referral_code')->nullable();
            $table->string('payment_image')->nullable();
            $table->string('payment_id')->nullable();
            $table->text('error');
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
        Schema::dropIfExists('registration_error_logs');
    }
}
