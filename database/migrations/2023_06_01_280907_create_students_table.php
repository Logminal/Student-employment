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
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->string('fio', 100);
            $table->foreignId('enterprises_id')->nullable()->constrained()->cascadeOnDelete();
            $table->foreignId('specializations_id')->nullable()->constrained()->cascadeOnDelete();
            $table->foreignId('teachers_id')->nullable()->constrained()->cascadeOnDelete();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->text('type_of_activity')->nullable();
            $table->text('dont_activity')->nullable();
            // $table->string('document')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('students');
    }
};
