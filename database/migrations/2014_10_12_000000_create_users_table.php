<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
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
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->foreignId('current_team_id')->nullable();
            $table->string('firstname')->nullable();
            $table->string('lastname')->nullable();

            $table->string( 'address' )->nullable();
            $table->string(    'address2' )->nullable();
            $table->string(    'city')->nullable();
            $table->string(    'state')->nullable();
            $table->string(   'zip')->nullable();
            $table->string(     'phone' )->nullable();
            $table->string(     'phone2')->nullable();

            $table->string(     'facebook' )->nullable();
            $table->string(    'facebook2')->nullable();
            $table->string(    'instagram')->nullable();
            $table->string(    'linkedin')->nullable();
            $table->string(     'youtube' )->nullable();
            $table->string(    'profilepic')->nullable();
            $table->string(    'gender')->nullable();
            $table->string(   'age')->nullable();
            $table->string(    'lat')->nullable();
            $table->string(    'lng' )->nullable();
            $table->string(    'description' )->nullable();
            $table->string(   'looking')->nullable();



            $table->string('profile_photo_path', 2048)->nullable();
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
};
