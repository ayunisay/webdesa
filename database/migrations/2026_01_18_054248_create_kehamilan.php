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
        Schema::create('kehamilan', function (Blueprint $table) {
            $table->id();
            $table->string('nama_ibu');
            $table->date('tanggal_lahir');
            $table->decimal('berat_badan', 10, 1);
            $table->decimal('tinggi', 10, 1);
            $table->decimal('lingkar_lengan', 10, 1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kehamilan');
    }
};
