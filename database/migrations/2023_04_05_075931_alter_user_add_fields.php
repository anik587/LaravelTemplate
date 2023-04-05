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

            $table->timestamp('password_expired_at')->after('remember_token')->nullable();
            $table->timestamp('password_reset_at')->after('password_expired_at')->nullable();
            $table->integer('is_active')->after('password_reset_at')->default(1);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('is_active');
            $table->dropColumn('password_expired_at');
            $table->dropColumn('password_reset_at');    
        });
    }
};
