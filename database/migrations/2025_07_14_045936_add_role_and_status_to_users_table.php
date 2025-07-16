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
            Schema::table('users', function (Blueprint $table) {
                $table->string('role')->default('staff'); // Default role is staff
                $table->boolean('is_active')->default(true); // true = active, false = deactivated
            });
        }


    /**
     * Reverse the migrations.
     */
    public function down(): void
        {
            Schema::table('users', function (Blueprint $table) {
                $table->dropColumn(['role', 'is_active']);
            });
        }

};
