<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOldPayoutsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('old_payouts', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id');
            $table->double('amount',8,2);
            $table->enum('payment_type', ['online','cash'])->default('cash');
            $table->text('payment_detail')->nullable();
            $table->text('remark')->nullable();
            $table->enum('payment_status', ['pending','success','cancel'])->default('pending');
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
        Schema::dropIfExists('old_payouts');
    }
}
