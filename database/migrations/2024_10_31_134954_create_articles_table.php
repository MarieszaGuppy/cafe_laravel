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
        Schema::create('articles', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('image');
            $table->foreignId('author_id')->constrained(
                table: 'users',
                indexName: 'articles_author_id'
            );
            $table->foreignId('category_id')->constrained(
                table: 'categories',
                indexName: 'articles_category_id'
            );
            $table->string('slug')->unique();
            $table->text('body');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('articles');
        Schema::table('articles', function (Blueprint $table) {
            $table->dropSoftDeletes();
        });
    }
};
