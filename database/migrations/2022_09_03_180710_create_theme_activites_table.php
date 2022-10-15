<?php

use App\Models\Activite;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateThemeActivitesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('theme_activites', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Activite::class)->nullable()->constrained()->onUpdate("cascade")->onDelete("cascade");
            $table->string("destination")->nullable();
            $table->date("depart")->nullable();
            $table->date("arrive")->nullable();
            $table->integer("adulte")->nullable();
            $table->integer("enfant")->nullable();
            $table->double("prix")->nullable();
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
        Schema::dropIfExists('theme_activites');
    }
}
