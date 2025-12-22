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
        Schema::create('license_applications', function (Blueprint $table) {
            $table->id();
            $table->string('license_number', 12);
            $table->date('issue_date');
            $table->date('expiry_date');
            $table->string('category');
            $table->string('image');
            $table->string('status')->in_array(['pending', 'approved', 'rejected'])->default('pending');
            $table->foreignId('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('license_applications');
    }
};
