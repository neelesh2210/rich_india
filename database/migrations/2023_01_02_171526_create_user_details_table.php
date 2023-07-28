<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_details', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id');
            $table->integer('current_plan_id');
            $table->double('total_commission',15,2)->default(0.00);
            $table->double('old_paid_payout',15,2)->default(0.00);
            $table->double('old_not_paid_payout',15,2)->default(0.00);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *B
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_details');
    }
}
