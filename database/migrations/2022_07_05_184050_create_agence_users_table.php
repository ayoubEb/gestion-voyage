<?php

use App\Models\Agence;
use App\Models\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAgenceUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('agence_users', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(User::class)
            ->nullable()
            ->constrained();
            $table->foreignIdFor(Agence::class)
            ->nullable()
            ->constrained();
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
        Schema::dropIfExists('agence_users');
    }
}
