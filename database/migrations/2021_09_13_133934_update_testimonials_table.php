<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class UpdateTestimonialsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::table('testimonials')->where('id', 1)->update([
            'designation' => 'Software developer',
            'title' => 'Why do we use it?',
            'image' => 'front/images/testimonial-image-female.jpg',
            'quote' => 'The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from "de Finibus Bonorum et Malorum" by Cicero are also reproduced in their exact original form.'
        ]);
        DB::table('testimonials')->where('id', 2)->update([
            'designation' => 'Application tester',
            'title' => 'What is Lorem Ipsum?',
            'image' => 'front/images/testimonial-image-female.jpg',
            'quote' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&apos;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.'
        ]);
        DB::table('testimonials')->where('id', 3)->update([
            'designation' => 'UI & UX designer',
            'title' => 'Contrary to popular belief',
            'image' => 'front/images/testimonial-image-female.jpg'
        ]);
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
