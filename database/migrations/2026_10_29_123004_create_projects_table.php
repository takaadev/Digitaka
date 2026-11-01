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
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->foreignId('project_inquiry_id')->nullable()->constrained('project_inquiries')->nullOnDelete();
            $table->string('project_code')->unique();
            $table->string('title');
            $table->string('client_name');
            $table->string('client_email')->nullable();
            $table->string('client_phone', 30)->nullable();
            $table->longText('description')->nullable();
            $table->decimal('total_price', 15, 2);
            $table->decimal('down_payment', 15, 2)->default(0);
            $table->enum('payment_method', ['full','installment'])->default('full');
            $table->unsignedTinyInteger('installment_count')->default(1);
            $table->date('start_date')->nullable();
            $table->date('deadline')->nullable();
            $table->date('completed_at')->nullable();
            $table->string('status')->default('pending');
            $table->text('admin_notes')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('projects');
    }
};
