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
        Schema::create('exam_links', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->longText('link');
            $table->bigInteger('status_id')->unsigned();
            $table->tinyInteger('solution')->default(0);
            $table->bigInteger('created_by');
            $table->timestamps();
            $table->foreign('status_id')->references('id')
            ->on('exam_link_statuses')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('exam_links');
    }
};
