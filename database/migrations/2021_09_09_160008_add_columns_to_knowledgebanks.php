<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnsToKnowledgebanks extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('knowledgebanks', function (Blueprint $table) {
            $table->string('image')->after('category');
            $table->string('video')->after('image');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('knowledgebanks', function (Blueprint $table) {
            $table->dropColumn('image');
            $table->dropColumn('video');
        });
    }
}
