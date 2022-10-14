<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdsFilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ads_files', function (Blueprint $table) {
            $table->string('id_advertisements');
            $table->string('id_files');
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
        Schema::dropIfExists('ads_files');
    }
}
