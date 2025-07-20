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
        Schema::create('accounts', function (Blueprint $table) {
            $table->id(); // Primary key ID
            $table->string('account_code')->unique(); // Unique account code
            $table->string('account_name'); // Account name
            $table->enum('account_type', ['cash', 'bank', 'others']); // Account type
            $table->decimal('initial_balance', 15, 2)->default(0); // Initial balance
            $table->decimal('total_balance', 15, 2)->default(0); // Total balance
            $table->text('note')->nullable(); // Optional note
            $table->timestamps(); // created_at and updated_at timestamps
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('accounts');
    }
};
