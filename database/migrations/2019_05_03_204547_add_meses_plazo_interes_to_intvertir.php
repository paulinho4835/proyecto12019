<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddMesesPlazoInteresToIntvertir extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('invertirs', function (Blueprint $table) {
            //
                $table->integer('interes')->unsigned()->nullable();
                $table->integer('plazo')->unsigned()->nullable();
            $table->integer('meses')->unsigned()->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('invertirs', function (Blueprint $table) {
            //
            $table->dropColumn('interes');
            $table->dropColumn('plazo');
            $table->dropColumn('meses');
        });
    }
}
