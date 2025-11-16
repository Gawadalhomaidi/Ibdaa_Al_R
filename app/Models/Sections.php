<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sections extends Model
{
        use HasFactory;

    protected $fillable = [
        'name_ar',
        'name_en',
        'title_ar',
        'title_en',
        'subtitle_ar',
        'subtitle_en',
        'description_ar',
        'description_en',
        'background_image',
        'section_type',
        'order',
        'is_active'
    ];
    
    public function features()
    {
        return $this->hasMany(Features::class, 'section_id');
    }

    public function modules()
    {
        return $this->hasMany(Modules::class, 'section_id');
    }

    public function technologies()
    {
        return $this->hasMany(Technologies::class, 'section_id');
    }

    public function pricingPlans()
    {
        return $this->hasMany(PricingPlans::class, 'section_id');
    }

    public function values()
    {
        return $this->hasMany(Values::class, 'section_id');
    }

    public function systems()
    {
        return $this->hasMany(Systems::class, 'section_id');
    }

    public function mediaServices()
    {
        return $this->hasMany(MediaServices::class, 'section_id');
    }

    public function partners()
    {
        return $this->hasMany(Partners::class, 'section_id');
    }

    public function strategyItems()
    {
        return $this->hasMany(StrategyItems::class, 'section_id');
    }

    public function statistics()
    {
        return $this->hasMany(Statistics::class, 'section_id');
    }

    public function aboutSection()
    {
        return $this->hasOne(AboutSections::class, 'section_id');
    }
 
    public function contactInfo()
    {
        return $this->hasOne(ContactInfos::class, 'section_id');
    }
}
