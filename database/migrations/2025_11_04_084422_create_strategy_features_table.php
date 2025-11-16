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
        Schema::create('strategy_features', function (Blueprint $table) {
            $table->id();
            $table->foreignId('strategy_item_id')->constrained('strategy_items')->onDelete('cascade');
            $table->string('feature_ar');
            $table->string('feature_en');
            $table->integer('order')->default(0);
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('strategy_features');
    }
};
