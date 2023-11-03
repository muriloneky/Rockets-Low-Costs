<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('cotacaos', function (Blueprint $table) {
            $table->id();
            $table->string('nome_do_foguete');
            $table->boolean('esta_ativo')->nullable()->default(0);
            $table->decimal('custo_por_lancamento', 10, 2)->nullable();
            $table->string('imagem')->nullable();
            $table->integer('margem_para_lucro')->nullable();
            $table->decimal('valor_do_lancamento', 10, 2)->nullable();
            $table->foreignId('lancamento_id')->nullable()->constrained('lancamentos');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('cotacaos');
    }
};
