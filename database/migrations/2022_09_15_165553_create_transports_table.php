<?php

use App\Models\Employe;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transports', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Employe::class)->nullable()->constrained()->onUpdate("cascade")->onDelete("cascade");
            $table->string('matricule')->unique()->nullable();
            $table->string('boite')->nullable();
            $table->integer('capacite')->nullable();
            $table->integer('vitesse')->nullable();
            $table->string('etat')->nullable();
            $table->string('statut')->nullable();
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
        Schema::dropIfExists('transports');
    }
}
