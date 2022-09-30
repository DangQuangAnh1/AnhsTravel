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
        Schema::create('nations', function (Blueprint $table) {
            $table->id();
            $table->string('nation_name');
            $table->string('nation_img');
            $table->string('nation_icon');
            $table->string('nation_map');
            $table->string('nation_describe',1000); 
            $table->string('population');
            $table->string('area');
            $table->string('language');
            $table->string('currency');
            $table->string('weather');
            $table->string('timezone');
            $table->string('weather_describe');
            $table->string('weather_img');
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
        Schema::dropIfExists('nations');
    }
};
