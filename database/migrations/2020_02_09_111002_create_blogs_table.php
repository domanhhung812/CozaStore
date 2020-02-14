<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBlogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('blogs', function (Blueprint $table) {
            $table->increments('id');
            $table->string('b_name')->nullable()->unique();
            $table->string('b_slug')->index();
            $table->string('b_description')->nullable();
            $table->longText('b_content')->nullable();
            $table->tinyInteger('b_active')->index()->default(1);
            $table->tinyInteger('b_author_id')->index()->default(0);
            $table->string('b_description_seo')->nullable();
            $table->string('b_title_seo')->nullable();
            $table->integer('b_view')->default('0');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('blogs');
    }
}
