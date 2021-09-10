<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class AddColumnsToCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('categories', function (Blueprint $table) {
            $table->string('image')->after('id');
        });

        DB::table('categories')->where('name', 'Music Tricks')->update(['image' => 'defaultImages/category/music.png']);
        DB::table('categories')->where('name', 'Cooking Tricks')->update(['image' => 'defaultImages/category/cooking.png']);
        DB::table('categories')->where('name', 'Photography')->update(['image' => 'defaultImages/category/camera.png']);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('categories', function (Blueprint $table) {
            $table->dropColumn('image');
        });
    }
}
