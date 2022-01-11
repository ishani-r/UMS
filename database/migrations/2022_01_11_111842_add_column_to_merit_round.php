<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnToMeritRound extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('merit_rounds', function (Blueprint $table) {
            $table->string('round_no')->nullable()->after('id');
            $table->boolean('status')->default(1)->comment('0 = inactive, 1 = active')->after('merit_result_declare_date');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('merit_rounds', function (Blueprint $table) {
            $table->dropColumn('round_no');
            $table->dropColumn('status');
        });
    }
}
