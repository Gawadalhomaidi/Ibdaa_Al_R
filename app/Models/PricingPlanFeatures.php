<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PricingPlanFeatures extends Model
{
    use HasFactory;
    protected $fillable = [
        'pricing_plan_id',
        'feature_ar',
        'feature_en',
        'order',
        'is_available'
    ];
    
    public function pricingplans(): BelongsTo
    {
         return $this->belongsTo(PricingPlans::class, 'pricing_plan_id');
    }
    public function getFeatureAttribute()
    {
        return app()->getLocale() === 'ar' ? $this->feature_ar : $this->feature_en;
    }
}
