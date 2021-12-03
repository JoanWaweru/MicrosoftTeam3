<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMedicalRecordTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('medical_record', function (Blueprint $table) {
            $table->id();
            $table->String('pulse_rate');
            $table->String('respiration_rate');
            $table->String('temperature');
            $table->String('blood_pressure');
            $table->String('symptoms');
            $table->String('condition_image_path')->nullable();
            $table->foreignId('doctor_response_id')->references('id')->on('doctor_response');
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
        Schema::dropIfExists('medical_record');
    }
}
