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
        Schema::table('texts_about_me', function (Blueprint $table) {
            $table->string('type');
            $table->string('subtype');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('texts_about_me', function (Blueprint $table) {
            $table->dropColumn('type');
            $table->dropColumn('subtype');
        });
    }
};
