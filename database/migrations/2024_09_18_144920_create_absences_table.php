<?php

use App\Models\Motif;
use App\Models\User;
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
        Schema::create('absences', function (Blueprint $table) {
            $table->id();
            $table->string('leaveStart');
            $table->string('leaveEnd');
            $table->foreignIdFor(User::class, 'user_id')->constrained('users');
            $table->foreignIdFor(Motif::class, 'motif_id')->constrained('motifs');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('absences');
    }
};
