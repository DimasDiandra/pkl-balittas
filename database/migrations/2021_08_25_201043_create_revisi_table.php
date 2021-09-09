<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRevisiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('semula_menjadi', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('name');
            $table->string('path');
            $table->integer('status');
            $table->string('keterangan')->nullable();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('projek_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('projek_id')->references('id')->on('projek');
        });

        Schema::create('revisi_rab', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('name');
            $table->string('path');
            $table->integer('status');
            $table->string('keterangan')->nullable();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('projek_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('projek_id')->references('id')->on('projek');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('revisi');
    }
}
