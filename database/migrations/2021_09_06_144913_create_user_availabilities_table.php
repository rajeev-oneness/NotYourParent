<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateUserAvailabilitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_availabilities', function (Blueprint $table) {
            $table->id();
            $table->string('name', 50);
            $table->string('type', 50);
            $table->softDeletes();
            $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP'));
        });

        $data = [
            ['name' => 'available', 'type' => 'success'],
            ['name' => 'not available', 'type' => 'danger'],
            ['name' => 'away', 'type' => 'primary'],
            ['name' => 'busy', 'type' => 'warning'],
        ];

        DB::table('user_availabilities')->insert($data);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_availabilities');
    }
}
