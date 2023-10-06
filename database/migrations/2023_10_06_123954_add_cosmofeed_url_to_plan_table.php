<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddCosmofeedUrlToPlanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('plans', function (Blueprint $table) {
            $table->text('cosmofeed_base_price_url')->nullabel()->after('description');
            $table->text('cosmofeed_discounted_price_url')->nullabel()->after('description');
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
            $table->dropColumn('cosmofeed_base_price_url');
            $table->dropColumn('cosmofeed_discounted_price_url');
        });
    }
}
