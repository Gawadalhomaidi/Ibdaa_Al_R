<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ContactInfos extends Model
{
    use HasFactory;

    protected $fillable = [
        'section_id',
        'phone',
        'email',
        'address_ar',
        'address_en',
        'background_image',
        'is_active'
    ];

   public function sections(): BelongsTo
    {
         return $this->belongsTo(Sections::class, 'section_id');
    }

    public function getAddressAttribute()
    {
        return app()->getLocale() === 'ar' ? $this->address_ar : $this->address_en;
    }
}
