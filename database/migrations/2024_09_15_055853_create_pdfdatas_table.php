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
        Schema::create('pdfdatas', function (Blueprint $table) {
            $table->id();
            $table->string('file_path'); // Menyimpan path file PDF
            $table->integer('kode'); // Menyimpan kode terkait item
            $table->text('note')->nullable(); // Menyimpan note dari user (opsional)
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pdfdatas');
    }
};
