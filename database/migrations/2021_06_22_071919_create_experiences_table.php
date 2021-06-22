<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExperiencesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('experiences', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('teacherId');
            $table->date('teaching_started');
            $table->softDeletes();
            $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP'));
        });

        $data = [
            [
                'teacherId' => 4,
                'teaching_started' => '2015-06-22'
            ],
            [
                'teacherId' => 5,
                'teaching_started' => '2018-06-22'
            ],
            [
                'teacherId' => 6,
                'teaching_started' => '2013-06-22'
            ],
            [
                'teacherId' => 7,
                'teaching_started' => '2019-06-22'
            ]
        ];

        DB::table('experiences')->insert($data);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('experiences');
    }
}
