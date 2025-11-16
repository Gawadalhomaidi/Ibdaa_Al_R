<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class StrategyItems extends Model
{
    use HasFactory;
    protected $fillable = [
        'section_id',
        'title_ar',
        'title_en',
        'description_ar',
        'description_en',
        'icon',
        'type',
        'position',
        'level',
        'color',
        'progress',
        'background_image',
        'order',
        'is_active'
    ];

    public function sections(): BelongsTo
    {
         return $this->belongsTo(Sections::class, 'section_id');
    }

    public function StrategyFeatures()
    {
        return $this->hasMany(StrategyFeatures::class, 'strategy_item_id');
    }
}
