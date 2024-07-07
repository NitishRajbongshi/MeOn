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
        Schema::create('student_course_mappings', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('student_id')->unsigned();
            $table->bigInteger('master_student_course_id')->unsigned();
            $table->timestamps();
            $table->foreign('student_id')->references('id')
            ->on('students')->onDelete('cascade');
            $table->foreign('master_student_course_id')->references('id')
            ->on('master_student_courses')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('student_course_mappings');
    }
};
