<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Statistics extends Model
{
    use HasFactory;
    protected $fillable = [
        'section_id',
        'title_ar',
        'title_en',
        'value',
        'icon',
        'background_image',
        'order',
        'is_active'
    ];

    public function sections(): BelongsTo
    {
         return $this->belongsTo(Sections::class, 'section_id');
    }
}
