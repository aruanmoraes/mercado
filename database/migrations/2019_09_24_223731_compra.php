<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Compra extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('compra', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nome', 150);
            $table->date('data');
            $table->timestamps();
            $table->softDeletes();
            $table->unsignedBigInteger('cliente_id');

        });

        Schema::table('compra', function (Blueprint $table) {
            $table->foreign('cliente_id')->references('id')->on('cliente');
            $table->index('cliente_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('compra');
    }
}
