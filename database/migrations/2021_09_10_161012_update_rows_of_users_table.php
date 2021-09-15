<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class UpdateRowsOfUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::table('users')->where('id', '2')->update(
            [
                'name' => 'Lisa Kudrow',
                'primary_category' => '1',
                'bio' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Cumque ratione rerum commodi repellat. Non necessitatibus assumenda dolore enim quasi temporibus, dolorem officiis ea cupiditate dignissimos placeat, fugit porro in eos.',
                'hourly_rate' => '49',
                'review' => '5.0',
                'rating_count' => '33',
            ]
        );
        DB::table('users')->where('id', '4')->update(
            [
                'name' => 'Jennifer Anniston',
                'primary_category' => '1',
                'review' => '3.5',
                'rating_count' => '33',
            ]
        );
        DB::table('users')->where('id', '5')->update(
            [
                'name' => 'Brad Lee Cooper',
                'primary_category' => '1',
            ]
        );
        DB::table('users')->where('id', '6')->update(
            [
                'name' => 'Chandler Bing',
                'primary_category' => '2',
            ]
        );
        DB::table('users')->where('id', '7')->update(
            [
                'name' => 'Monica Geller',
                'primary_category' => '2',
            ]
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
