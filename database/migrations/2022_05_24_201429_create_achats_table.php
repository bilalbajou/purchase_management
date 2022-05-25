<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAchatsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('achats', function (Blueprint $table) {
            $table->id('id_achat')->autoIncrement();
            $table->string('libellé');
            $table->date('date_achat');
            $table->double('montant_total');
            $table->string('bon');
            $table->unsignedBigInteger('Agent')->unsigned();
            $table->unsignedBigInteger('fournisseur')->unsigned();
            $table->foreign('Agent')->references('id')->on('users');
            $table->foreign('fournisseur')->references('id_frn')->on('fournisseurs');
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
        Schema::dropIfExists('achats');
    }
}
