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
            $table->string('code')->unique();
            $table->timestamp('appt_datetime');
            $table->unsignedBigInteger('patient_id');
            $table->timestamp('arrived_at')->nullable();
            $table->enum('status', ['pending', 'arrived', 'rescheduled']);
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
