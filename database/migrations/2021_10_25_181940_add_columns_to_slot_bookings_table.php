<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnsToSlotBookingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('slot_bookings', function (Blueprint $table) {
            $table->string('uuid')->after('transactionId');
            $table->bigInteger('meetingId')->after('uuid');
            $table->string('host_id')->after('meetingId');
            $table->string('host_email')->after('host_id');
            $table->string('topic')->after('host_email');
            $table->string('start_time')->after('topic');
            $table->string('agenda')->after('start_time');
            $table->string('join_url')->after('agenda');
            $table->string('password')->after('join_url');
            $table->string('encrypted_password')->after('password');
            $table->string('status')->after('encrypted_password');
            $table->string('type')->after('status');
            $table->longText('start_url')->after('type');
            $table->string('remark')->after('start_url');
            $table->tinyInteger('over')->after('remark')->default(0)->comment('1:Meeting Over, 0: Not Done');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('slot_bookings', function (Blueprint $table) {
            $table->dropColumn('uuid');
            $table->dropColumn('meetingId');
            $table->dropColumn('host_id');
            $table->dropColumn('host_email');
            $table->dropColumn('topic');
            $table->dropColumn('start_time');
            $table->dropColumn('agenda');
            $table->dropColumn('join_url');
            $table->dropColumn('password');
            $table->dropColumn('encrypted_password');
            $table->dropColumn('status');
            $table->dropColumn('type');
            $table->dropColumn('start_url');
            $table->dropColumn('remark');
            $table->dropColumn('over');
        });
    }
}
