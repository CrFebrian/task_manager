<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTasksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tasks', function (Blueprint $table) {
            $table->id();  // Primary key, auto-increment
            $table->integer('user_id');  // Foreign key untuk pengguna
            $table->string('title');  // Judul tugas
            $table->text('description');  // Deskripsi tugas
            $table->string('status')->default('Pending');  // Status tugas (misal: pending, completed)
            $table->date('due_date')->nullable();  // Tanggal jatuh tempo
            $table->timestamps();  // Timestamps untuk created_at dan updated_at
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tasks');
    }
}
