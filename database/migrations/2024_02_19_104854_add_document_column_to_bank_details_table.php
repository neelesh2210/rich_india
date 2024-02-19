<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddDocumentColumnToBankDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('bank_details', function (Blueprint $table) {
            $table->string('aadhar_name')->nullable()->after('upi_id');
            $table->string('aadhar_number')->nullable()->after('aadhar_name');
            $table->string('pan_name')->nullable()->after('aadhar_number');
            $table->string('pan_number')->nullable()->after('pan_name');
            $table->string('aadhar_front_image')->nullable()->after('pan_number');
            $table->string('aadhar_back_image')->nullable()->after('aadhar_front_image');
            $table->string('pan_image')->nullable()->after('aadhar_back_image');
            $table->longText('note')->nullable()->after('pan_image');
            $table->longText('admin_message')->nullable()->after('note');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('bank_details', function (Blueprint $table) {
            $table->dropColumn('aadhar_name');
            $table->dropColumn('aadhar_number');
            $table->dropColumn('pan_name');
            $table->dropColumn('pan_number');
            $table->dropColumn('aadhar_front_image');
            $table->dropColumn('aadhar_back_image');
            $table->dropColumn('pan_image');
            $table->dropColumn('note');
            $table->dropColumn('admin_message');
        });
    }
}
