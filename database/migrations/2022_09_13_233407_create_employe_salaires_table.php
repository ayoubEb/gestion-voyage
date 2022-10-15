<?php

use App\Models\Employe;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeSalairesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employe_salaires', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Employe::class)->nullable()->constrained()->onUpdate("cascade")->onDelete("cascade");
            $table->double("salaire")->nullable();
            $table->integer("jour")->nullable();
            $table->integer("mois")->nullable();
            $table->year("annee")->nullable();
            $table->string('etat')->nullable();
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
        Schema::dropIfExists('employe_salaires');
    }
}
