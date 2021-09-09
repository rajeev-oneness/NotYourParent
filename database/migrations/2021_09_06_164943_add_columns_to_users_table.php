<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class AddColumnsToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            // $table->text('language')->comment('add languages seperated by commas')->after('availability');
            $table->integer('hourly_rate')->comment('enter rate only')->after('availability');
            $table->float('company_score')->comment('nyp score out of 100')->after('hourly_rate');
            $table->float('review', 3, 2)->comment('students score out of 5')->after('company_score');
            $table->bigInteger('rating_count')->after('review');
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
            // $table->dropColumn('language');
            $table->dropColumn('hourly_rate');
            $table->dropColumn('company_score');
            $table->dropColumn('review');
            $table->dropColumn('rating_count');
        });
    }
}
