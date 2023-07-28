<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFaildPayoutsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('faild_payouts', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id');
            $table->double('amount',15,2);
            $table->enum('payment_type', ['cash', 'online']);
            $table->text('payment_detail')->nullable();
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
        Schema::dropIfExists('faild_payouts');
    }
}
