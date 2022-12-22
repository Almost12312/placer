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
            $table->unsignedBigInteger('author_id')->nullable();
            $table->string('title')->nullable();
            $table->text('content')->nullable();
            $table->string('location')->nullable();
            $table->dateTime('delete_at')->nullable();
            $table->integer('price')->nullable();
            $table->integer('views')->nullable();
            $table->unsignedBigInteger('category_id')->nullable();
            $table->integer('status')->default(1);
            $table->timestamps();


            $table->foreign('author_id')->references('id')->on('users');
            $table->foreign('category_id')->references('id')->on('categories');
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
