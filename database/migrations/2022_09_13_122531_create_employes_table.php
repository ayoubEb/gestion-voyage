<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employes', function (Blueprint $table) {
            $table->id();
            
            $table->string("photo")->nullable();
            $table->string("cnie")->unique()->nullable();
            $table->string("name")->nullable();
            $table->string("adresse")->nullable();
            $table->string("ville")->nullable();
            $table->string("pays")->nullable();
            $table->string("nationalite")->nullable();
            $table->string("email")->unique()->nullable();
            $table->string("telephone")->nullable();
            $table->string("cv")->nullable();
            $table->string("genre")->nullable();
            $table->string("poste")->nullable();
            $table->string("travail")->nullable();
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
        Schema::dropIfExists('employes');
    }
}
