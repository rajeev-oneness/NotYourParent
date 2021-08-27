<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class UpdateKnowledgebankTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('knowledgebanks', function (Blueprint $table) {
            $table->string('category')->nullable()->default(null)->after('id');
            $table->string('title')->nullable()->default(null)->after('category');
            $table->string('subtitle')->nullable()->default(null)->after('title');
            $table->string('description')->nullable()->default(null)->after('subtitle');
        });

        $data = [
            [
                "category" => "1",
                "title" => "how to test the first knowledge bank post",
                "subtitle" => "what should be added to the knowledge bank subtitle post",
                "description" => "Lorem ipsum dolor sit amet consectetur adipisicing elit. Blanditiis mollitia voluptatibus assumenda eligendi ea amet est unde doloribus nemo magnam laudantium architecto quis voluptatum fugiat rem, corporis maiores beatae laboriosam!",
            ],
            [
                "category" => "1",
                "title" => "this is the second knowledge bank post",
                "subtitle" => "second knowledge subtitle post",
                "description" => "Lorem ipsum dolor sit amet consectetur adipisicing elit. Architecto quisquam aliquam mollitia necessitatibus veritatis numquam dicta laborum dolores quod in eligendi corporis, quasi doloribus, nulla accusantium! Debitis consectetur possimus quo!",
            ],
            [
                "category" => "2",
                "title" => "network of sites where people write about their passions!",
                "subtitle" => "What Type of Kitty Litter and Box Should I Use?",
                "description" => "Lorem ipsum dolor sit amet, consectetur adipisicing elit. Assumenda eius ad eligendi molestiae veritatis deleniti ut modi hic illum? In modi repudiandae aspernatur adipisci ab saepe eaque nihil reiciendis est?",
            ],
        ];

        DB::table('knowledgebanks')->insert($data);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('knowledgebanks', function(Blueprint $table) {
            $table->dropColumn(['category', 'title', 'subtitle', 'description']);
        });
    }
}
