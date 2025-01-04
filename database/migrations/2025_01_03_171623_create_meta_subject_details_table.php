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
        Schema::create('meta_subject_details', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('standard_id')->unsigned();
            $table->bigInteger('master_language_id')->unsigned();
            $table->string('meta_title');
            $table->text('meta_description');
            $table->text('keywords')->nullable();
            $table->foreignId('created_by')->constrained('users');
            $table->foreignId('updated_by')->constrained('users');
            $table->foreign('standard_id')->references('id')->on('standards')->onDelete('cascade');
            $table->foreign('master_language_id')->references('id')->on('master_languages')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('meta_subject_details');
    }
};
