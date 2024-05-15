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
        Schema::create('noticias', function (Blueprint $table) {
            $table->id();
            $table->text('noticia'); 
            $table->string('img', '191');

            $table->unsignedBigInteger('usuario_id')->nullable(); // Permite que a chave estrangeira seja nula
            $table->foreign('usuario_id')->references('id')->on('usuarios')->nullable(); // Define a chave estrangeira como nula até que a tabela 'usuarios' seja criada

            
            $table->unsignedBigInteger('categoria_id'); 
            $table->foreign('categoria_id')->references('id')->on('categorias');
            
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
        Schema::dropIfExists('noticias');
    }
};
