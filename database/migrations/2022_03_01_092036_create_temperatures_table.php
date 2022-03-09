<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTemperaturesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('temperatures', function (Blueprint $table) {
            $table->id();
            $table->dateTime('Date_temperatures');
            $table->float('Temperature_Values');
            $table->string('Consigne_A');
            $table->string('Consigne_B');
            $table->string('Fin_Manuel');
            $table->string('Percent');
            $table->string('Compter');
            $table->integer('kWh');
            $table->string('Regim');
            $table->string('Puiss');
            $table->string('Diam');
            $table->string('V_Pos');
            $table->foreignId('room_id')->constrained()->onDelete('cascade');
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
        Schema::dropIfExists('temperatures');
    }
}
