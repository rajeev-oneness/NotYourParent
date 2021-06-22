<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCoursesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('courses', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('teacherId');
            $table->bigInteger('categoryId');
            $table->string('name');
            $table->longText('description');
            $table->longText('image');
            $table->integer('duration')->comment('In minutes');
            $table->float('price', 8,2);
            $table->softDeletes();
            $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP'));
        });
        for ($i=1; $i <= 3; $i++) {
            $data = [
                [
                    'teacherId' => 4,
                    'categoryId' => 1,
                    'name' => 'LET’S LEARN SOME LOREM IPSUM',
                    'description' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum.Ipsum is simply dummy text of the printing.',
                    'image' => 'front/images/mentor-img-'.$i.'.jpg',
                    'duration' => 15,
                    'price' => 30,
                ]
            ];
            DB::table('courses')->insert($data); 
            for ($j=2; $j <= 4; $j++) { 
                $data = [
                    [
                        'teacherId' => $j+3,
                        'categoryId' => $j,
                        'name' => 'LET’S LEARN SOME LOREM IPSUM',
                        'description' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum.Ipsum is simply dummy text of the printing.',
                        'image' => 'front/images/mentor-img-'.$i.'.jpg',
                        'duration' => 15,
                        'price' => 30,
                    ]
                ];
                DB::table('courses')->insert($data);
            }
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('courses');
    }
}
