<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password');
            $table->string("role")->nullable();
            $table->string("photo")->nullable();
            $table->string("cnie")->unique()->nullable();
            $table->string("adresse")->nullable();
            $table->string("ville")->nullable();
            $table->string("pays")->nullable();
            $table->string("nationalite")->nullable();
            $table->string("telephone")->nullable();
            $table->string("genre")->nullable();
            $table->string("poste")->nullable();
            $table->string("travail")->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
