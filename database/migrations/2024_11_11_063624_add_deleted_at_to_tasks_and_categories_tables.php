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
        Schema::table('tasks', function (Blueprint $table) {
            $table->softDeletes(); // Menambahkan kolom deleted_at untuk soft deletes
        });

        Schema::table('categories', function (Blueprint $table) {
            $table->softDeletes(); // Menambahkan kolom deleted_at untuk soft deletes
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('tasks', function (Blueprint $table) {
            $table->dropSoftDeletes(); // Menghapus kolom deleted_at jika rollback
        });

        Schema::table('categories', function (Blueprint $table) {
            $table->dropSoftDeletes(); // Menghapus kolom deleted_at jika rollback
        });
    }
};