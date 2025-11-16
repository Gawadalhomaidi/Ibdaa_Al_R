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
        Schema::create('about_sections', function (Blueprint $table) {
               $table->id();
            $table->foreignId('section_id')->constrained('sections')->onDelete('cascade');
            
            // العنوان الرئيسي والوصف
            $table->string('title_ar');
            $table->string('title_en');
            $table->text('description_ar');
            $table->text('description_en');
            
            // قسم Our Mission
            $table->string('mission_title_ar');
            $table->string('mission_title_en');
            $table->text('mission_description_ar');
            $table->text('mission_description_en');
            
            // نقاط المهمة
            $table->text('mission_point1_ar');
            $table->text('mission_point1_en');
            $table->text('mission_point2_ar');
            $table->text('mission_point2_en');
            $table->text('mission_point3_ar');
            $table->text('mission_point3_en');
            
            // قسم Why Choose Us
            $table->string('why_choose_us_title_ar');
            $table->string('why_choose_us_title_en');
            $table->text('why_choose_us_description_ar');
            $table->text('why_choose_us_description_en');
            
            // الإحصائيات
            $table->string('uptime_value')->default('99.9%');
            $table->string('uptime_label_ar');
            $table->string('uptime_label_en');
            
            $table->string('support_value')->default('24/7');
            $table->string('support_label_ar');
            $table->string('support_label_en');
            
            $table->string('clients_value')->default('500+');
            $table->string('clients_label_ar');
            $table->string('clients_label_en');
            
            $table->string('experience_value')->default('5+');
            $table->string('experience_label_ar');
            $table->string('experience_label_en');
            
            // خلفية القسم
            $table->string('background_image')->nullable();
            $table->string('mission_background_image')->nullable();
            $table->string('stats_background_image')->nullable();
            
            // إعدادات إضافية
            $table->integer('order')->default(0);
            $table->boolean('show_mission')->default(true);
            $table->boolean('show_stats')->default(true);
            $table->boolean('is_active')->default(true);
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('about_sections');
    }
};
