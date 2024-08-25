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
        Schema::create('user_plan_mappings', function (Blueprint $table) {
            $table->id();
            $table->string('reference_id', 100);
            $table->bigInteger('user_id')->unsigned();
            $table->bigInteger('master_subscription_plan_id')->unsigned();
            $table->boolean('approve')->default('0');
            $table->bigInteger('standard_id')->unsigned();
            $table->bigInteger('subject_id')->unsigned()->nullable();
            $table->bigInteger('chapter_id')->unsigned()->nullable();
            $table->timestamps();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('master_subscription_plan_id')->references('id')->on('master_subscription_plans')->onDelete('cascade');
            $table->foreign('standard_id')->references('id')->on('standards')->onDelete('cascade');
            $table->foreign('subject_id')->references('id')->on('subjects')->onDelete('cascade');
            $table->foreign('chapter_id')->references('id')->on('chapters')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_plan_mappings');
    }
};
