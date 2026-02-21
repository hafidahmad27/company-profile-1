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
        Schema::create('sections', function (Blueprint $table) {
            $table->id();
            $table->foreignId('page_id')->nullable()->constrained()
                ->onUpdate('cascade')
                ->onDelete('set null');
            $table->string('section_key')->index();
            $table->string('title')->nullable();
            $table->string('subtitle')->nullable();
            $table->string('image')->nullable();
            $table->string('button_text')->nullable();
            $table->string('button_link')->nullable();
            $table->unsignedTinyInteger('order')->default(0);
            $table->boolean('is_active')->unsigned()->default(false);
            $table->foreignId('user_id')->nullable()->constrained()
                ->onUpdate('cascade')
                ->onDelete('set null');
            $table->timestamps();

            $table->unique(['page_id', 'section_key']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sections');
    }
};
