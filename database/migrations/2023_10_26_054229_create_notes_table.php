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
        Schema::create('notes', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('standard_id');
            $table->bigInteger('subject_id');
            $table->bigInteger('chapter_id');
            $table->string('name');
            $table->longText('description')->nullable();
            // $table->string('path');
            $table->bigInteger('created_by');
            $table->bigInteger('updated_by');
            $table->timestamps();
            $table->foreign('standard_id')->references('id')
            ->on('standards')->onDelete('cascade');
            $table->foreign('subject_id')->references('id')
            ->on('subjects')->onDelete('cascade');
            $table->foreign('chapter_id')->references('id')
            ->on('chapters')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('notes');
    }
};
