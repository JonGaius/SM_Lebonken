<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArticleattributesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('articleattributes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('subcategoryattribute_id');
            $table->unsignedBigInteger('article_id');
            $table->string('slug')->unique();
            $table->string('value');
            $table->foreign('subcategoryattribute_id')->references('id')->on('subcategoryattributes');
            $table->foreign('article_id')->references('id')->on('articles');
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
        Schema::dropIfExists('articleattributes');
    }
}
