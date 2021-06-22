<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpadteTestimonialTable22062021 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('testimonials', function (Blueprint $table) {
            $table->bigInteger('teacherId')->after('quote');
        });

        $data = [
            [
                'name' => 'Robin Wise',
                'designation' => 'Charlotte, NC',
                'title' => 'LET’S LEARN SOME LOREM IPSUM',
                'image' => 'front/images/reviews_class_master.jpg',
                'quote' => 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old.Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words,',
                'teacherId' => 4,
            ],
            [
                'name' => 'Johnathon Doe',
                'designation' => 'Charlotte, NC',
                'title' => 'LET’S LEARN SOME LOREM IPSUM',
                'image' => 'front/images/reviews_class_master.jpg',
                'quote' => 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old.Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words,',
                'teacherId' => 4,
            ],
            [
                'name' => 'Jenifar Doe',
                'designation' => 'Charlotte, NC',
                'title' => 'LET’S LEARN SOME LOREM IPSUM',
                'image' => 'front/images/reviews_class_master.jpg',
                'quote' => 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old.Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words,',
                'teacherId' => 4,
            ],
        ];
        DB::table('testimonials')->insert($data);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('testimonials', function (Blueprint $table) {
            $table->dropColumn(['teacherId']);
        });
    }
}
