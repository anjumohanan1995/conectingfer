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
        Schema::table('main_menus', function (Blueprint $table) {
            $table->string('slug')->nullable()
                ->after('link');
            $table->string('no')->nullable()
                ->after('slug');            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('main_menus', function (Blueprint $table) {
            $table->dropColumn('slug');
            $table->dropColumn('no');
        });
    }
};
