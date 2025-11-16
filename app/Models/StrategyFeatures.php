<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class StrategyFeatures extends Model
{
    use HasFactory;
    protected $fillable = [
        'strategy_item_id',
        'feature_ar',
        'feature_en',
        'order',
        'is_active'
    ];

    public function strategyitems(): BelongsTo
    {
         return $this->belongsTo(StrategyItems::class, 'strategy_item_id');
    }
public function getFeatureAttribute()
{
    return app()->getLocale() === 'ar' ? $this->feature_ar : $this->feature_en;
}
}
