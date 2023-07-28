<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCoursesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('courses', function (Blueprint $table) {
            $table->id();
            $table->string('slug');
            $table->string('name');
            $table->string('image')->nullable();
            $table->double('price',8,2);
            $table->double('discount',8,2)->default(0.00);
            $table->double('discounted_price',8,2);
            $table->double('referral_commission',8,2)->default(0.00);
            $table->enum('referral_commission_type', ['amount', 'percent'])->nullable()->default('amount');
            $table->text('description')->nullable();
            $table->string('seo_title')->nullable();
            $table->text('seo_keyword')->nullable();
            $table->text('seo_description')->nullable();
            $table->enum('status', [1, 0])->nullable()->default(1);
            $table->enum('delete_status', [1, 0])->nullable()->default(0);
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
        Schema::dropIfExists('courses');
    }
}
