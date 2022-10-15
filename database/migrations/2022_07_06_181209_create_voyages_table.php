<?php

use App\Models\Chauffeur;
use App\Models\Transport;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVoyagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('voyages', function (Blueprint $table) {
            $table->id();
            $table->string('nom')->nullable();
            // $table->string('type_voyage')->nullable();
            $table->date('date_depart')->nullable();
            $table->date('date_retour')->nullable();
            $table->time('heure_lance')->nullable();
            $table->time('heure_retour')->nullable();
            $table->string('ville_destination')->nullable();
            $table->double('prix')->nullable();
            $table->string('mode_paiement')->nullable();
            $table->string('statut_payer')->nullable();
            $table->integer('nombre_jour')->nullable();
            $table->string('gens_voyage')->nullable();
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
        Schema::dropIfExists('voyages');
    }
}
