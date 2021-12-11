<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMedicalRecordsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('medical_records', function (Blueprint $table) {
            $table->id();
            $table->String('pulse_rate');
            $table->String('respiration_rate');
            $table->String('temperature');
            $table->String('blood_pressure');
            $table->String('symptoms');
            $table->String('patients_id');//acts as a reference in the nurses module
            $table->String('condition_image_path')->nullable();
            $table->foreignId('doctor_response_id')->references('id')->on('doctor_responses')->nullable();
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
        Schema::dropIfExists('medical_records');
    }
}
