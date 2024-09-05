<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddExtraDiscountColumnToPlanPurchasesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('plan_purchases', function (Blueprint $table) {
            $table->double('extra_discount',15,2)->default(0.00)->after('discounted_amount');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('plan_purchases', function (Blueprint $table) {
            $table->dropColumn('extra_discount');
        });
    }
}
