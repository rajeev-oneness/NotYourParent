<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->string('key');
            $table->string('heading');
            $table->longText('description');
            $table->string('image');
            $table->string('link');
            $table->softDeletes();
            $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP'));
        });

        $data = [
            [
                'key' => 'about_us_main',
                'heading' => 'Something interesting about us',
                'description' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&apos;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially',
                'image' => 'front/images/about-banner.jpg',
                'link' => ''
            ],
            [
                'key' => 'how_it_works_main',
                'heading' => 'Learn A Skillset In 10 Minutes',
                'description' => 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using.',
                'image' => 'front/images/how-it-work.png',
                'link' => ''
            ],
            [
                'key' => 'how_it_works_child',
                'heading' => 'SIGN UP',
                'description' => '',
                'image' => 'front/images/sign_up.png',
                'link' => '',
                // 'link' => '{{route("front.sign-up",["userType" => 3])}}#join-now',
            ],
            [
                'key' => 'how_it_works_child',
                'heading' => 'SEARCH EXPERT',
                'description' => '',
                'image' => 'front/images/search_expart.png',
                'link' => '',
                // 'link' => '{{URL::to("/")}}#search-experts',
            ],
            [
                'key' => 'how_it_works_child',
                'heading' => 'JOIN A CLASS',
                'description' => '',
                'image' => 'front/images/join-class.png',
                'link' => '',
            ],
            [
                'key' => 'how_it_works_child',
                'heading' => 'LEARN & ENJOY',
                'description' => '',
                'image' => 'front/images/learn_enjoy.png',
                'link' => '',
            ],
        ];

        DB::table('settings')->insert($data);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('settings');
    }
}
