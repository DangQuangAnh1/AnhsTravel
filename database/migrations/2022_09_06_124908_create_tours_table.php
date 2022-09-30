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
        Schema::create('tours', function (Blueprint $table) {
            $table->id();
            $table->string('tour_name');
            $table->string('tour_img');
            $table->string('tour_city');
            $table->string('style_name');
            $table->string('nation_name');
            $table->string('tour_img_1');
            $table->string('tour_img_2');
            $table->string('tour_img_3');
            $table->string('tour_overview',1000);
            $table->string('tour_trip',1000);
            $table->string('tour_map',1000);
            $table->string('tour_day',1000);
            $table->string('tour_price');
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
        Schema::dropIfExists('tours');
    }
};
