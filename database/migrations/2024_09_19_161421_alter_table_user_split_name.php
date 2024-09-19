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
        Schema::table('users',function(Blueprint $table){
            $table->after('id', function(Blueprint $table){
                $table->string('firstname', 30);
                $table->string('lastname', 30);
            });
            $table->dropColumn('name');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users',function(Blueprint $table){
            $table->after('id', function(Blueprint $table){
                $table->string('name',30);
            });
            $table->dropColumn('firstname', 30);
            $table->dropColumn('lastname', 30);
        });
    }
};
