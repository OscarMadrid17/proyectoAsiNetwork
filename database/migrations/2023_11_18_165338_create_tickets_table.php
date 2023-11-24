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
        Schema::create('tickets', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email');
            $table->string('phoneNumber');
            $table->string('emailNotifications')->nullable();
            $table->string('emailNotifications2')->nullable();
            $table->unsignedTinyInteger('reportType')->nullable();
            $table->string('dateDetection');
            $table->time('reportTime');
            $table->string('scheduleVisit')->nullable();
            $table->string('contactName')->nullable();
            $table->string('internalCustomerTicket')->nullable();
            $table->string('description')->nullable();
            $table->string('visitRequirement')->nullable();
            $table->string('image')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tickets');
    }
};
