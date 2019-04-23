<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRecipesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('recipes', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('recipe_list_id');
            $table->foreign('recipe_list_id')->references('id')->on('recipe_lists')->onDelete('cascade');
            $table->string('yummly_id');
            $table->string('name');
            $table->string('source');
            $table->string('image');
            $table->timestamps();

            $table->unique(['recipe_list_id', 'yummly_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('recipes');
    }
}
