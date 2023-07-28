<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddNewcolumnToPlansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('plans', function (Blueprint $table) {
            $table->integer('priority')->after('id');
            $table->text('upgrade_amount')->after('commission');
            $table->text('upgrade_commission')->after('upgrade_amount');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('plans', function (Blueprint $table) {
            $table->dropColumn('priority');
            $table->dropColumn('upgrade_amount');
            $table->dropColumn('upgrade_commission');
        });
    }
}
