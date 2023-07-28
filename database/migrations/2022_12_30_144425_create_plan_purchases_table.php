<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlanPurchasesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('plan_purchases', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id');
            $table->integer('plan_id');
            $table->text('course_ids');
            $table->double('amount',8,2);
            $table->text('payment_detail')->nullable();
            $table->enum('payment_status', ['pending','success','failed'])->default('pending');
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
        Schema::dropIfExists('plan_purchases');
    }
}
