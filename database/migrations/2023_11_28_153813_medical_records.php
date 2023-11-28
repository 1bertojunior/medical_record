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
            $table->string('image_path')->nullable(); // Campo para armazenar o caminho do arquivo da imagem
            $table->text('chief_complaint')->nullable(); // Queixa principal
            $table->text('history_of_present_illness')->nullable(); // História da doença atual
            $table->text('past_medical_history')->nullable(); // História médica pregressa
            $table->text('family_history')->nullable(); // História familiar
            $table->text('physical_examination')->nullable(); // Exame físico
            $table->text('diagnosis')->nullable(); // Diagnóstico
            $table->text('treatment_plan')->nullable(); // Plano de tratamento
            $table->text('medications')->nullable(); // Medicamentos prescritos
            $table->text('follow_up_instructions')->nullable(); // Instruções de acompanhamento
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('medical_records');
    }
};
