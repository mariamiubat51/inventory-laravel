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
        $table->id(); // ID
        $table->string('account_code')->unique(); // Code
        $table->string('account_name'); // Name
        $table->enum('account_type', ['cash', 'bank', 'others']); // Type
        $table->decimal('initial_balance', 15, 2)->default(0); // Initial Balance
        $table->decimal('total_balance', 15, 2)->default(0); // Total Balance
        $table->text('note')->nullable(); // Note
        $table->timestamps();
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
