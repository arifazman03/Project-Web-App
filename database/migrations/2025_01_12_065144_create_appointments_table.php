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

    Schema::create('appointments', function (Blueprint $table) {
        $table->id();
        $table->string('appointment_id');
        $table->string('patient_id');
        $table->string('doctor_id');
        $table->dateTime('appointment_date');
        $table ->dateTime ('appointment_time');
        $table->timestamps();
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('appointments');
    }
};
