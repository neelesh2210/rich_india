<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnToPlanPurchasesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('plan_purchases', function (Blueprint $table) {
            $table->double('discounted_amount',8,2)->default(0.00)->after('amount');
            $table->double('total_amount',8,2)->default(0.00)->after('discounted_amount');
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
            $table->dropColumn('discounted_amount');
            $table->dropColumn('total_amount');
        });
    }
}
