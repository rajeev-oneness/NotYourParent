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
            $table->string('short_description')->after('dob');
            $table->longText('bio')->after('short_description');
            $table->string('linkedin_url')->after('bio');
            $table->string('fb_url')->after('linkedin_url');
            $table->string('twitter_url')->after('fb_url');
            $table->string('instagram_url')->after('twitter_url');
            $table->tinyInteger('is_verified')->comment('1: verified, 0: Not verified')->default(1)->after('instagram_url');
        });

        for ($i=1; $i <= 4; $i++) { 
            $data = [
                [
                    'user_type' => 2,
                    'name' => 'Yasmain Marlly',
                    'email' => 'teacher'.$i.'@teacher'.$i.'.com',
                    'password' => Hash::make('secret'),
                    'image' => 'front/images/testimonial-image-female.jpg',
                    'referral_code' => 'AAAAAA'.$i,
                    'short_description' => 'Expert in this field',
                    'bio' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Porro explicabo earum perspiciatis vitae eaque dolorum cupiditate dolores accusamus quidem odit, dolor quis nulla error temporibus, assumenda voluptatibus blanditiis! Ea ipsum reiciendis repellendus maxime nesciunt nulla. Ducimus nihil saepe provident atque magnam laborum eos soluta eveniet doloribus delectus, magni reiciendis quo similique ad ipsum quibusdam.<p>Lorem ipsum dolor, sit amet consectetur adipisicing elit.</p><p>Lorem ipsum dolor, sit amet consectetur adipisicing elit sit amet consectetur adipisicing elit</p>',
                ]
            ];
            DB::table('users')->insert($data);
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn(['short_description', 'bio','linkedin_url', 'fb_url', 'twitter_url', 'instagram_url', 'is_verified']);
        });
    }
}
