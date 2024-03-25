<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('industrial_services', function (Blueprint $table) {
            $table->string('no')->nullable()
                ->after('description');            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('industrial_services', function (Blueprint $table) {
            $table->dropColumn('no');
        });
    }
};
