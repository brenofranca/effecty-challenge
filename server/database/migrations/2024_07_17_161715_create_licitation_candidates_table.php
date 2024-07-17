<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('licitation_candidates', function (Blueprint $table) {
            $table->unsignedBiginteger('company_id');
            $table->unsignedBiginteger('licitation_id');

            $table->foreign('company_id')->references('id')->on('companies')->onDelete('cascade');
            $table->foreign('licitation_id')->references('id')->on('licitations')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('licitation_candidates');
    }
};
