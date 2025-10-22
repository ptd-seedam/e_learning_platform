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
        Schema::create('payments', function (Blueprint $table) {
                    $table->id('PAYMENTID');
                    $table->foreignId('EnrollmentId')->constrained('enrollments', 'EnrollmentId')->onDelete('cascade');
                    $table->decimal('Amount', 8, 2);
                    $table->date('PaymentDate');
                    $table->string('PaymentMethod', 100);
                    $table->string('Status', 50)->default('Pending');
                    $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payments');
    }
};
