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
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->string('project_title')->nullable();
            $table->string('app_url')->nullable();
            $table->string('cpy_txt')->nullable();
            $table->string('default_phone')->nullable();
            $table->string('favicon')->nullable();
            $table->string('fb_url')->nullable();
            $table->string('footer_logo')->nullable();
            $table->string('instagram_url')->nullable();
            $table->string('linkedin_url')->nullable();
            $table->string('logo')->nullable();
            $table->string('logo_type')->nullable();
            $table->string('twitter_url')->nullable();
            $table->string('wel_email')->nullable();
            $table->string('youtube_url')->nullable();
            $table->string('why_choose_subtitle')->nullable();
            $table->string('why_choose_title')->nullable();
            $table->text('footer_content')->nullable();
            $table->text('default_address')->nullable();                
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
        Schema::dropIfExists('settings');
    }
};
