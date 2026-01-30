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
        Schema::table('pages', function (Blueprint $table) {
            $table->string('hero_subtitle')->nullable();
            $table->string('hero_image')->nullable();
            $table->string('hero_cta_text')->nullable();
            $table->string('hero_cta_link')->nullable();
            $table->text('about_text')->nullable();
            $table->string('about_image')->nullable();
        });
    }

    public function down(): void
    {
        Schema::table('pages', function (Blueprint $table) {
            // This is what was missing!
            $table->dropColumn(['hero_subtitle', 'hero_image', 'hero_cta_text', 'hero_cta_link', 'about_text', 'about_image']);
        });
    }
};
