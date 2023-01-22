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
        Schema::create('senhas', function (Blueprint $table) {
            $table->id();
            $table->string('senha');
            $table->unsignedBigInteger('tipo_atendimento_id');
            $table->unsignedBigInteger('servico_id');
            $table->boolean('cooperado');
            $table->date('inicio_atendimento')->nullable();
            $table->date('fim_atendimento')->nullable();
            $table->integer('tempo_atendimento')->nullable();
            $table->unsignedBigInteger('usuario_atendimento_id')->nullable();
            $table->enum('status', ['AGUARDANDO', 'ATENDIMENTO', 'FINALIZADO', 'CANCELADO']);
            $table->timestamps();

            $table->foreign('usuario_atendimento_id')->references('id')->on('users');
            $table->foreign('tipo_atendimento_id')->references('id')->on('tipo_atendimentos');
            $table->foreign('servico_id')->references('id')->on('servicos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('senhas');
    }
};
