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
        Schema::disableForeignKeyConstraints();

        Schema::create('team_submissions_details', function (Blueprint $table) {
            $table->id();
            $table->foreignId('team_submissions_id')->constrained('team_submissions');
            $table->foreignId('submissions_type_id')->constrained('submissions_types');
            $table->string('path');
            $table->timestamps();
        });

        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('team_submissions_details');
    }
};
