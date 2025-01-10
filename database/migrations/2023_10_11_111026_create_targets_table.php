<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTargetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('targets', function (Blueprint $table) {
            $table->id()->index();
            $table->string('slug')->unique()->index();
            $table->string('name');
            $table->string('image')->nullable();
            $table->date('start_date')->index();
            $table->date('end_date')->index();
            $table->double('amount',15,2);
            $table->longText('description_one')->nullable();
            $table->longText('description_two')->nullable();
            $table->longText('description_three')->nullable();
            $table->integer('no_of_referral');
            $table->enum('is_active', ['1', '0'])->default('1')->index();
            $table->softDeletes()->index();
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
        Schema::dropIfExists('targets');
    }
}
