<?php

use App\Models\AttributValue;
use App\Models\Hotel;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHotelAttributsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hotel_attributs', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Hotel::class)->nullable()->constrained()->onDelete("cascade")->onDelete("cascade");
            $table->foreignIdFor(AttributValue::class)->nullable()->constrained()->onDelete("cascade")->onDelete("cascade");
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
        Schema::dropIfExists('hotel_attributs');
    }
}
