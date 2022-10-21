<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdvertisementsFilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('advertisements_files', function (Blueprint $table) {
            $table->unsignedBigInteger('id_advertisements');
            $table->unsignedBigInteger('id_files');
            $table->foreign('id_advertisements')->references('id')->on('advertisements');
            $table->foreign('id_files')->references('id')->on('files');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('advertisements_files');
    }
}
