<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTeacherTopicsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('teacher_topics', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('teacherId');
            $table->bigInteger('topicId');
            $table->softDeletes();
            $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP'));
        });
        
        $data = [
            [
                'teacherId' => 4,
                'topicId' => 1
            ],
            [
                'teacherId' => 5,
                'topicId' => 2
            ],
            [
                'teacherId' => 6,
                'topicId' => 3
            ],
            [
                'teacherId' => 7,
                'topicId' => 4
            ],
            [
                'teacherId' => 4,
                'topicId' => 5
            ],
        ];

        DB::table('teacher_topics')->insert($data);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('teacher_topics');
    }
}
