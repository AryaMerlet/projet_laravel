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
        Schema::table('motifs', function (Blueprint $table){
            $table->dropColumn('firstname');
            $table->dropColumn('lastname');
            $table->dropColumn('job');
            $table->dropColumn('is_accessible_worker');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('motifs', function (Blueprint $table){
            $table->string('firstname');
            $table->string('lastname');
            $table->string('job');
            $table->bool('is_accessible_worker');
        });
    }
};
