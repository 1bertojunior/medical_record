<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('healthcare_profession_types', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('council_type'); // Adicione o tipo de conselho (ex: CRM, COREN)
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('healthcare_profession_types');
    }
};
