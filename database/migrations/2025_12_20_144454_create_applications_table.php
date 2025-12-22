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
        Schema::create('applications', function (Blueprint $table) {
            $table->id();
            $table->string('phone', 10);
            $table->string('province', 100);
            $table->string('medical_image');
            $table->string('area', 255);
            $table->string('blood_type', 3);
            $table->string('vehicle_group', 50);
            $table->foreignId('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->string('status')->in_array(['pending', 'approved','rejected'])->default('pending');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('applications');
    }
};
