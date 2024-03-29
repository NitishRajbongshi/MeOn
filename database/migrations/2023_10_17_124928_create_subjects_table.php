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
        // Schema::create('subjects', function (Blueprint $table) {
        //     $table->id();
        //     $table->bigInteger('standard_id');
        //     $table->string('name', '100');
        //     $table->longText('description')->nullable();
        //     $table->bigInteger('created_by');
        //     $table->bigInteger('updated_by');
        //     $table->timestamps();
        //     $table->foreign('standard_id')->references('id')
        //     ->on('standards')->onDelete('cascade');
        // });
        Schema::create('subjects', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('standard_id')->unsigned(); // Added unsigned for foreign key
            $table->string('name', 100);
            $table->longText('description')->nullable();
            $table->bigInteger('created_by');
            $table->bigInteger('updated_by');
            $table->timestamps();

            // Added foreign key constraint
            $table->foreign('standard_id')->references('id')->on('standards')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('subjects');
    }
};
