<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddCouponToPlanPurchasesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('plan_purchases', function (Blueprint $table) {
            $table->text('coupon_detail')->nullable()->after('discounted_amount');
            $table->double('coupon_discount_amount',8,2)->nullable()->after('coupon_detail');
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
            $table->dropColumn('coupon_detail');
            $table->dropColumn('coupon_discount_amount');
        });
    }
}
