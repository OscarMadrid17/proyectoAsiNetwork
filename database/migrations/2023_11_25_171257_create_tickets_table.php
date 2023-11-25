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

            // Pulled from external API
            $table->string('name', 255);
            $table->string('email', 255);
            $table->string('phone_number', 25);
            $table->json('affected_services');

            // Self Store In App Constants
            $table->unsignedTinyInteger('report_type');

            // Defined by customer
            $table->string('contact_name', 255)->nullable();
            $table->string('first_contact_email', 255)->nullable();
            $table->string('second_contact_email', 255)->nullable();
            $table->dateTime('detection_datetime');
            $table->dateTime('visit_schedule_datetime');
            $table->string('internal_customer_ticket', 100)->nullable();
            $table->longText('description', 10000)->nullable();
            $table->longText('visit_requirement', 10000)->nullable();
            $table->string('file', 250)->nullable();
            $table->unsignedBigInteger('customer_id');
            $table->unsignedBigInteger('user_id')->nullable();
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
