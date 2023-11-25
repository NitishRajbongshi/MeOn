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
        Schema::create('note_resources', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('note_id');
            $table->string('img_path');
            $table->timestamps();
            $table->foreign('note_id')->references('id')
            ->on('notes')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('note_resources');
    }
};
