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
        Schema::table('motifs', function (Blueprint $table) {
            Schema::dropColumns('motifs', 'name');
            $table->after('description', function (Blueprint $table) {
                $table->string('firstname');
                $table->string('lastname');
            });
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('motifs', function (Blueprint $table) {
            Schema::dropColumns('motifs', 'firstname');
            Schema::dropColumns('motifs', 'lastname');
            $table->string('name');
        });
    }
};
