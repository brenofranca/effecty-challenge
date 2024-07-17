<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('licitation_responsibles', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email');
            $table->string('phone');
            $table->timestamps();
            
            $table->unsignedBiginteger('licitation_id');
            $table->foreign('licitation_id')->references('id')->on('licitations')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('licitation_responsibles');
    }
};
