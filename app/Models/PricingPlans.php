<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PricingPlans extends Model
{
    use HasFactory;
        protected $fillable = [
        'section_id',
        'name_ar',
        'name_en',
        'description_ar',
        'description_en',
        'price',
        'currency',
        'period_ar',
        'period_en',
        'is_popular',
        'background_image',
        'order',
        'is_active'
    ];

    
    public function sections(): BelongsTo
    {
         return $this->belongsTo(Sections::class, 'section_id');
    }

    public function PricingPlanFeatures()
    {
        return $this->hasMany(PricingPlanFeatures::class, 'pricing_plan_id');
    }
}
