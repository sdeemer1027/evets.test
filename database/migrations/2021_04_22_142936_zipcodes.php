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
        Schema::create('zipcodes', function (Blueprint $table) {
            $table->id();

            $table->string('zip')->nullable;
            $table->string('type')->nullable;
            $table->string('city')->nullable;
            $table->string('typeb')->nullable;
            $table->string('statename')->nullable;
            $table->string('stateabv')->nullable;
            $table->string('code')->nullable;
            $table->string('lat')->nullable;
            $table->string('lng')->nullable;
            $table->string('country')->nullable;
            $table->string('status')->nullable;


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
        //
    }
};
