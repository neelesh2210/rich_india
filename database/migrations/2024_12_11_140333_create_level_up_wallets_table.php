<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLevelUpWalletsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('level_up_wallets', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id');
            $table->bigInteger('from_id');
            $table->double('amount',15,2);
            $table->enum('type', ['credit', 'debit']);
            $table->enum('from', ['active_commission', 'passive_commission', 'upgrade', 'main_wallet_transfer']);
            $table->text('remark')->nullable();
            $table->enum('delete_status', ['1', '0'])->default('0');
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
        Schema::dropIfExists('level_up_wallets');
    }
}
