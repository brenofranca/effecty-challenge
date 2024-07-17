<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('licitations', function (Blueprint $table) {
            $table->id();
            $table->string('number');
            $table->string('department');
            $table->string('status');
            $table->string('objective');
            $table->string('form_acquisition');
            $table->string('date_published');
            $table->timestamps();
            
            $table->string('winner_id')->nullable();
            $table->foreign('winner_id')->references('id')->on('companies')->onDelete('cascade')->nullable();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('licitations');
    }
};
