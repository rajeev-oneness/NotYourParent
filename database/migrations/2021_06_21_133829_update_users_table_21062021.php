<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateUsersTable21062021 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->integer('teaching_category')->comment('Empty for student')->after('dob');
            $table->string('short_description')->after('teaching_category');
            $table->longText('bio')->after('short_description');
            $table->string('linkedin_url')->after('bio');
            $table->string('fb_url')->after('linkedin_url');
            $table->string('twitter_url')->after('fb_url');
            $table->string('instagram_url')->after('twitter_url');
            $table->tinyInteger('is_verified')->after('instagram_url');
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
            $table->dropColumn(['teaching_category', 'short_description', 'bio','linkedin_url', 'fb_url', 'twitter_url', 'instagram_url', 'is_verified']);
        });
    }
}
