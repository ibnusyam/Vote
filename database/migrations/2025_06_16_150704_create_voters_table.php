<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVotersTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('voters', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('candidate_id')->nullable();
            $table->string('nama')->nullable();
            $table->string('nim')->unique()->nullable();
            $table->enum('status', ['belum', 'sudah'])->default('belum')->nullable();
            $table->timestamps();

            // foreign key ke tabel kandidat (pastikan nama tabel kandidatnya misalnya 'candidates')
            $table->foreign('candidate_id')->references('id')->on('candidates')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('voters');
    }
}
