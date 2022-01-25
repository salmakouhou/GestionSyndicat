<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAbonneTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('abonne', function (Blueprint $table) {
            $table->reference();
            $table->nom();
            $table->email();
            $table->tel();
            $table->date_debut();
            $table->foreign('categorie_id')->references('id')->on('categories')->onDelete('cascade');
            $table->mdp();
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
        Schema::dropIfExists('abonne');
    }
}
