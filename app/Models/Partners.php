<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Partners extends Model
{

    use HasFactory;
    protected $fillable = [
        'section_id',
        'name_ar',
        'name_en',
        'logo',
        'icon',
        'sector_ar',
        'sector_en',
        'color',
        'background_image',
        'years',
        'rating',
        'order',
        'is_active'
    ];

     public function sections(): BelongsTo
    {
         return $this->belongsTo(Sections::class, 'section_id');
    }
}

