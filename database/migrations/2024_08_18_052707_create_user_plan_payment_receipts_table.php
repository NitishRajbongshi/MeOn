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
        Schema::create('user_plan_payment_receipts', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_plan_mapping_id')->unsigned();
            $table->string('img_path');
            $table->timestamps();
            $table->foreign('user_plan_mapping_id')->references('id')
            ->on('user_plan_mappings')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_plan_payment_receipts');
    }
};
