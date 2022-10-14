<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdvertisementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('advertisements', function (Blueprint $table) {
            $table->id();
            $table->integer('author_id');
            $table->string('title');
            $table->string('content');
            $table->string('location');
            $table->dateTime('create_at');
            $table->dateTime('delete_at');
            $table->dateTime('update_at');
            $table->string('price');
            $table->integer('id_category');
            $table->integer('status');

            $table->foreign('author_id')->references('id')->on('users');
            $table->foreign('id_category')->references('id')->on('category');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('advertisements');
    }
}
