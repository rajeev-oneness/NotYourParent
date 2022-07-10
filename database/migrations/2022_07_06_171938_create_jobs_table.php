<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJobsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jobs1', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('cat_id');
            $table->string('type');
            $table->text('skill');
            $table->text('scope');
            $table->string('budget');
            $table->string('start_date');
            $table->string('end_date');
            $table->text('description');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('jobs');
    }
}
