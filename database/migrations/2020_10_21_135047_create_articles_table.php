<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArticlesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('articles', function (Blueprint $table) {
           
            $table->id();
            $table->unsignedBigInteger('subcategory_id');
            $table->unsignedBigInteger('user_id')->nullable();
            $table->unsignedBigInteger('boutique_id')->nullable();
            $table->string('name');
            $table->string('slug')->unique();
            $table->integer('price');
            $table->integer('condition');
            $table->integer('quantity')->default(0);
            $table->integer('view')->default(0);
            $table->integer('like')->default(0);
            $table->integer('livraison')->default(0);
            $table->boolean('limited')->default(true);
            $table->boolean('type')->default(false);
            $table->boolean('active')->default(true);
            $table->boolean('admin_active')->default(false);
            $table->boolean('brouillon')->default(false);
            $table->integer('percent')->default(0);
            $table->text('description');
            $table->boolean('boutique')->default(false);
            $table->foreign('subcategory_id')->references('id')->on('subcategories');
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('boutique_id')->references('id')->on('boutiques');
            
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
        Schema::dropIfExists('articles');
    }
}
