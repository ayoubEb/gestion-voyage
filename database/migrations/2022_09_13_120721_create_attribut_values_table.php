<?php

use App\Models\Attribut;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAttributValuesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('attribut_values', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Attribut::class)->nullable()->constrained()->onUpdate("cascade")->onDelete("cascade");
            $table->string('valeur')->nullable();
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
        Schema::dropIfExists('attribut_values');
    }
}
