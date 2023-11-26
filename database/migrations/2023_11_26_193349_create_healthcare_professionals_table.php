<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up()
    {
        Schema::create('healthcare_professionals', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('profession_type_id');
            $table->foreign('profession_type_id')->references('id')->on('healthcare_profession_types');
            $table->string('name');
            $table->string('document_number'); 
            $table->timestamps();
        });
    }

  
    public function down()
    {
        Schema::dropIfExists('healthcare_professionals');
    }
};
