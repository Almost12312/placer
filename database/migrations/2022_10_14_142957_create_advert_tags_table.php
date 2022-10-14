<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdvertTagsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('advert_tags', function (Blueprint $table) {
            $table->string('id_advertisements');
            $table->string('id_tags');

            $table->foreign('id_advertisements')->references('id')->on('advertisements');
            $table->foreign('is_tags')->references('id')->on('tags');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('advert_tags');
    }
}
