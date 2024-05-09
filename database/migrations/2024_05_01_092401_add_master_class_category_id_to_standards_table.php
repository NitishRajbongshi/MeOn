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
        Schema::table('standards', function (Blueprint $table) {
            $table->bigInteger('master_class_category_id')->after('description')->unsigned();
            // $table->foreign('master_class_category_id')->references('id')->on('master_class_categories')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('standards', function (Blueprint $table) {
            // $table->dropForeign(['category_id']);
            $table->dropColumn('master_class_category_id');
        });
    }
};
