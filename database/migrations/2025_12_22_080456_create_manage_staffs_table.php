<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('manage_staffs', function (Blueprint $table) {
            $table->id();

            // EXACT same as parent tables
            $table->integer('session_id');   // SIGNED
            $table->unsignedInteger('user_id'); // users.id is unsigned

            $table->string('date_of_joining');
            $table->string('relieving_date')->nullable();
            $table->string('experience')->nullable();

            $table->decimal('salary', 10, 2);
            $table->string('id_adhar', 12)->unique();

            $table->string('designation');
            $table->text('qualifications')->nullable();

            $table->decimal('previous_salary_increment', 10, 2)->nullable();

            $table->timestamps();

            $table->foreign('session_id')
                  ->references('id')->on('sessions')
                  ->onDelete('cascade');

            $table->foreign('user_id')
                  ->references('id')->on('users')
                  ->onDelete('cascade');
        });

    }

    public function down(): void
    {
        Schema::dropIfExists('manage_staffs');
    }
};
