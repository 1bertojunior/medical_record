<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('medical_records', function (Blueprint $table) {
            $table->id();
            $table->foreignId('patient_id')->constrained(); // Relacionamento com a tabela de pacientes
            $table->foreignId('healthcare_professional_id')->constrained(); // Relacionamento com a tabela de profissionais de saúde
            $table->string('file_path')->nullable(); // Campo para armazenar o caminho do arquivo
            $table->text('complaints')->nullable(); // Queixa doença
            $table->text('disease_history')->nullable();
            $table->text('allergies')->nullable();
            $table->text('diagnosis')->nullable(); // Diagnóstico
            $table->text('follow_up_instructions')->nullable(); // Instruções de acompanhamento
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('medical_records');
    }
};
