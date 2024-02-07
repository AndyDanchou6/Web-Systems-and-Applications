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
        Schema::create('chapters', function (Blueprint $table) {
            $table->id();
            $table->text('chapter_title')->default('No Information from Author');
            $table->text('date')->default('Unknown');
            $table->unsignedBigInteger('manga_id');
            $table->longtext('contents');
            $table->integer('status')->default('0');
            $table->timestamps();

            $table->foreign('manga_id')->references('id')->on('manga')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('chapters', function (Blueprint $table) {
            $table->dropForeign(['manga_id']);
            $table->dropColumn('manga_id');
        });
        Schema::dropIfExists('chapters');
    }
};
