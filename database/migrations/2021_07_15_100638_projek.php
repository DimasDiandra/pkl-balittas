<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Projek extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projek', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('name');
            $table->string('all_status');
            $table->integer('matriks_status');
            $table->integer('rab_status');
            $table->integer('kak_status');
            $table->integer('proposal_status');
            $table->integer('analisis_status');
            $table->integer('bulanan_status');
            $table->integer('triwulan_status');
            $table->integer('tengahtahun_status');
            $table->integer('akhirtahun_status');
            $table->integer('renaksi_status');
            $table->integer('destudi_status');

            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
