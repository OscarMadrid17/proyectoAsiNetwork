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
        Schema::create('tickets_comments', function (Blueprint $table) {
            $table->id();
            $table->boolean('created_by_customer')->default(true);
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('ticket_id');
            $table->string('content', 5000);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tickets_comments');
    }
};
