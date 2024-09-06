<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRatingSocialLinkColumnToInstructorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('instructors', function (Blueprint $table) {
            $table->string('rating')->nullable()->after('image');
            $table->string('facebook')->nullable()->after('rating');
            $table->string('twitter')->nullable()->after('facebook');
            $table->string('whatsapp')->nullable()->after('twitter');
            $table->string('instagram')->nullable()->after('whatsapp');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('instructors', function (Blueprint $table) {
            $table->dropColumn('rating');
            $table->dropColumn('facebook');
            $table->dropColumn('twitter');
            $table->dropColumn('whatsapp');
            $table->dropColumn('instagram');
        });
    }
}
