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
        Schema::create('frase_inspiracions', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->createdBy();

            $table->text('frase');
            $table->tinyInteger('nivel_privacidad')->nullable()->comment('0: publica, 1: solo el creador puede verla');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('frase_inspiracions');
    }
};
