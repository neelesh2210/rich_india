<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->enum('gender', ['male', 'female'])->nullable()->after('phone');
            $table->string('city',100)->nullable()->after('state');
            $table->string('pincode',100)->nullable()->after('city');
            $table->string('address',500)->nullable()->after('pincode');
            $table->string('avatar',100)->nullable()->after('address');
            $table->enum('is_old', [1,0])->default(0)->after('is_verified');
            $table->enum('added_by', ['self', 'admin'])->default('self')->after('id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('gender');
            $table->dropColumn('address');
            $table->dropColumn('city');
            $table->dropColumn('pincode');
            $table->dropColumn('avatar');
            $table->dropColumn('is_old');
            $table->dropColumn('added_by');
        });
    }
}
