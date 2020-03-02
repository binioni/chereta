<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('catagories_id')->unsigned();
            $table->foreign('catagories_id')->references('id')->on('catagories');
            $table->string('title');
            $table->longText('description');
            $table->string('contact');
            $table->string('requirment');
            $table->string('city');
            $table->bigInteger('companies_id')->unsigned();
            $table->foreign('companies_id')->references('id')->on('companies');
            $table->DateTime('open');/* bid opening date */
            $table->DateTime('close');/* bid closing date */
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
        Schema::dropIfExists('posts');
    }
}
