<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEletrodomesticosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('eletrodomesticos', function (Blueprint $table) {
            $table->id();
            $table->string('nome', 200);
            $table->string('descricao', 200);
            $table->enum('tensao', ['110V', '220V', '100V', '127V', '230V', '240V', '208V', '480V']);
            $table->string('marca', 200);
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
        Schema::dropIfExists('eletrodomesticos');
    }
}
