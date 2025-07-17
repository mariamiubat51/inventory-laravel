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
        Schema::create('transaction_logs', function (Blueprint $table) {
        $table->id('log_id');
        $table->string('transaction_id'); // matches account_transactions.transaction_id
        $table->string('transaction_type');
        $table->string('action');
        $table->string('paid_status_before')->nullable();
        $table->string('paid_status_after')->nullable();
        $table->decimal('amount_paid', 15, 2)->default(0);
        $table->decimal('due_amount', 15, 2)->default(0);
        $table->string('performed_by')->nullable();
        $table->text('description')->nullable();
        $table->timestamp('date')->useCurrent();
        
        $table->index('transaction_id');  // index for faster lookups
    });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transaction_logs');
    }
};
