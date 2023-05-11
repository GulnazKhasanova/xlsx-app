<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateZakazTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('zakaz', function (Blueprint $table) {
            $table->increments('id');
            $table->string('id_zakaz')->nullable($value = true);
            $table->dateTime('created_at')->nullable($value = true);
            $table->string('status')->nullable($value = true);
            $table->string('comment')->nullable($value = true);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('zakaz');
    }
}
