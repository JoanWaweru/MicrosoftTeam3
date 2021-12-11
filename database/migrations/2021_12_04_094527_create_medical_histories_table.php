<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMedicalHistoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('medical_histories', function (Blueprint $table) {
            $table->id();
            $table->string('weight');
            $table->string('height');
            $table->string('medical_problems');
            $table->string('allergies');
            $table->string('medication');
            $table->string('patients_id');//acts as a reference in the nurses module
            $table->foreignId('emergency_contact_id')->references('id')->on('emergency_contacts');
            $table->foreignId('patient_id')->references('id')->on('users');
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
        Schema::dropIfExists('medical_histories');
    }
}
