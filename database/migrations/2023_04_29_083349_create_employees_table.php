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
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email');
            $table->string('phone');
            $table->string('address');
            $table->string('experience');
            $table->tinyInteger('status')->nullable();
            $table->string('image');
            $table->string('nid_no');
            $table->string('salary');
            $table->string('vacation');
            $table->string('city'); 
            $table->foreignId('user_id')->constrained()->cascadeOnDelete()->cascadeOnUpdate(); 

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employees');
    }
};
