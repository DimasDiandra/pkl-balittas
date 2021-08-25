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
            $table->string('all_status')->nullable();
            $table->integer('matriks_status')->nullable();
            $table->integer('rab_status')->nullable();
            $table->integer('kak_status')->nullable();
            $table->integer('proposal_status')->nullable();
            $table->integer('analisis_status')->nullable();
            $table->integer('bulanan_status')->nullable();
            $table->integer('triwulan_status')->nullable();
            $table->integer('tengahtahun_status')->nullable();
            $table->integer('akhirtahun_status')->nullable();
            $table->integer('renaksi_status')->nullable();
            $table->integer('destudi_status')->nullable();
            $table->integer('semula_menjadi_status')->nullable();
            $table->integer('revisi_rab_status')->nullable();

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
