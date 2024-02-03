<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBlogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('blogs', function (Blueprint $table) {
            $table->id();
            $table->string('slug')->unique()->index();
            $table->string('title');
            $table->string('topic');
            $table->string('image');
            $table->longText('tags')->nullable();
            $table->string('written_by')->nullable();
            $table->string('writter_position')->nullable();
            $table->string('writter_image')->nullable();
            $table->longText('facebook_link')->nullable();
            $table->longText('twitter_link')->nullable();
            $table->longText('printrest_link')->nullable();
            $table->longText('instagram_link')->nullable();
            $table->text('short_description')->nullable();
            $table->longText('description');
            $table->enum('is_publish', ['1', '0'])->default('1')->index();
            $table->softDeletes()->index();
            $table->timestamps();

            $table->index('created_at');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('blogs');
    }
}
