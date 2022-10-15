<?php

use App\Models\Agence;
use App\Models\Client;
use App\Models\Voyage;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReservationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reservations', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Client::class)
                  ->constrained()
                  ->nullable();
            $table->foreignIdFor(Voyage::class)
                  ->constrained()
                  ->nullable();
            $table->foreignIdFor(Agence::class)
                  ->constrained()
                  ->nullable();
            $table->string('num_reservation')->nullable();
            $table->string('valid_reservation')->nullable();
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
        Schema::dropIfExists('reservations');
    }
}
