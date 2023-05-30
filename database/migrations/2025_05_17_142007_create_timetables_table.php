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
        Schema::create('timetables', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('teacher_id')->nullable();
            //$table->unsignedBigInteger('student_id')->nullable();
            $table->unsignedBigInteger('group_id')->nullable();
            $table->string('day');
            $table->time('start_time');
            $table->time('end_time');
            $table->timestamps();
            
            $table->foreign('teacher_id')->references('id')->on('users')->where('usertype', 'teacher')->onDelete('cascade');
            //$table->foreign('student_id')->references('id')->on('users')->where('usertype', 'student')->onDelete('cascade');
            $table->foreign('group_id')->references('id')->on('groups')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('timetables');
    }
};
