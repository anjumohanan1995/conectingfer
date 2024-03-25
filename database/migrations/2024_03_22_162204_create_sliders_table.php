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
        Schema::create('sliders', function (Blueprint $table) {
            $table->id();
            $table->string('slider_category_id')->nullable();
            $table->string('title')->nullable();
            $table->string('link')->nullable();
            $table->text('description')->nullable();
            $table->string('image')->nullable();
            $table->string('button_text')->nullable();
            $table->string('video')->nullable();
            $table->string('button_url')->nullable();
            $table->string('button_one_text')->nullable();
            $table->string('button_one_url')->nullable();
            $table->string('button_status')->nullable();
            $table->string('slider_style')->nullable();
            $table->string('color')->nullable();
            $table->string('slider_status')->nullable();
            $table->string('slider_type')->nullable();        
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sliders');
    }
};
