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
        Schema::create('expanses', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users');
            $table->string('name');
            $table->string('amount');
            // manager check
            $table->boolean('manager_check')->default(false);
            // hod check
            $table->boolean('hod_check')->default(false);
            // status as varchar(255) default blank
            $table->string('status')->default('');
            // attached file
            $table->string('file')->default('');
            // comments
            $table->text('comments')->default('');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('expanses');
    }
};
