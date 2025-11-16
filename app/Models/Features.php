<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Features extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'section_id',
        'title_ar',
        'title_en',
        'description_ar',
        'description_en',
        'icon',
        'background_image',
        'order',
        'is_active'
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];

    public function sections(): BelongsTo
    {
         return $this->belongsTo(Sections::class, 'section_id');
    }

    public function getBackgroundImageUrlAttribute()
    {
        if ($this->background_image) {
            return asset('storage/' . $this->background_image);
        }
        return null;
    }
}
