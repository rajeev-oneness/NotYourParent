<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class InsertDataToSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::table('settings')->insert([
            [
                'key' => 'terms_and_conditions',
                'description' => '<h2>Essential things to think about before starting a blog</h2><p>It has been exactly 3 years since I wrote my first blog series entitled &ldquo;Flavorful Tuscany&rdquo;, but starting it was definitely not easy. Back then, I didn&rsquo;t know much about blogging, let alone think that one day it could become <strong>my full-time job</strong>. Even though I had many recipes and food-related stories to tell, it never crossed my mind that I could be sharing them with the whole world.</p><p>I am now a <strong>full-time blogger</strong> and the curator of the <a href="https://ckeditor.com/ckeditor-4/#">Simply delicious newsletter</a>, sharing stories about traveling and cooking, as well as tips on how to run a successful blog.</p><p>If you are tempted by the idea of creating your own blog, please think about the following:</p><ul><li>Your story (what do you want to tell your audience)</li><li>Your audience (who do you write for)</li><li>Your blog name and design</li></ul><p>After you get your head around these 3 essentials, all you have to do is grab your keyboard and the rest will follow.</p>',
            ],
            [
                'key' => 'privacy_policy',
                'description' => '<h2>Essential things to think about before starting a blog</h2><p>It has been exactly 3 years since I wrote my first blog series entitled &ldquo;Flavorful Tuscany&rdquo;, but starting it was definitely not easy. Back then, I didn&rsquo;t know much about blogging, let alone think that one day it could become <strong>my full-time job</strong>. Even though I had many recipes and food-related stories to tell, it never crossed my mind that I could be sharing them with the whole world.</p><p>I am now a <strong>full-time blogger</strong> and the curator of the <a href="https://ckeditor.com/ckeditor-4/#">Simply delicious newsletter</a>, sharing stories about traveling and cooking, as well as tips on how to run a successful blog.</p><p>If you are tempted by the idea of creating your own blog, please think about the following:</p><ul><li>Your story (what do you want to tell your audience)</li><li>Your audience (who do you write for)</li><li>Your blog name and design</li></ul><p>After you get your head around these 3 essentials, all you have to do is grab your keyboard and the rest will follow.</p>',
            ]
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::table('settings')->where('key', 'terms_and_conditions')->delete();
        DB::table('settings')->where('key', 'privacy_policy')->delete();
    }
}
