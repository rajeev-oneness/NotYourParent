<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateMasterTable28062021 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::table('masters')->truncate();
        Schema::table('masters', function (Blueprint $table) {
            $table->float('commission', 5,2)->after('otp');
        });
        $password = generateUniqueAlphaNumeric(8);
        $data = [
            [
                'password' => Hash::make($password),
                'originalpassword' => $password,
                'otp' => 123456,
                'commission' => 10,
            ],
        ];
        DB::table('masters')->insert($data);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('masters', function (Blueprint $table) {
            $table->dropColumn(['commission']);
        });
    }
}
