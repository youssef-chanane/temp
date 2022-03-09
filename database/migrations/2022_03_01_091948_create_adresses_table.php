<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdressesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('adresses', function (Blueprint $table) {
            $table->id();
            $table->string('company')->nullable();
            $table->text('adress');
            $table->string('poste');
            $table->string('state');
            $table->string('tel')->nullable();
            $table->string('tel1')->nullable();
            $table->string('logitude')->nullable();
            $table->string('latitude')->nullable();
            $table->string('ipBox');
            $table->foreignId('apartement_id')->constrained()->onDelete('cascade');
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
        Schema::dropIfExists('adresses');
    }
}
