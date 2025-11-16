<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class AboutSections extends Model
{
    use HasFactory;

    protected $fillable = [
        'section_id',
        'title_ar',
        'title_en',
        'description_ar',
        'description_en',
        'mission_title_ar',
        'mission_title_en',
        'mission_description_ar',
        'mission_description_en',
        'mission_point1_ar',
        'mission_point1_en',
        'mission_point2_ar',
        'mission_point2_en',
        'mission_point3_ar',
        'mission_point3_en',
        'why_choose_us_title_ar',
        'why_choose_us_title_en',
        'why_choose_us_description_ar',
        'why_choose_us_description_en',
        'uptime_value',
        'uptime_label_ar',
        'uptime_label_en',
        'support_value',
        'support_label_ar',
        'support_label_en',
        'clients_value',
        'clients_label_ar',
        'clients_label_en',
        'experience_value',
        'experience_label_ar',
        'experience_label_en',
        'background_image',
        'mission_background_image',
        'stats_background_image',
        'order',
        'show_mission',
        'show_stats',
        'is_active'
    ];

    public function sections(): BelongsTo
    {
         return $this->belongsTo(Sections::class, 'section_id');
    }

    public function getTitleAttribute()
    {
        return app()->getLocale() === 'ar' ? $this->title_ar : $this->title_en;
    }

    public function getDescriptionAttribute()
    {
        return app()->getLocale() === 'ar' ? $this->description_ar : $this->description_en;
    }

    public function getMissionTitleAttribute()
    {
        return app()->getLocale() === 'ar' ? $this->mission_title_ar : $this->mission_title_en;
    }

    public function getMissionDescriptionAttribute()
    {
        return app()->getLocale() === 'ar' ? $this->mission_description_ar : $this->mission_description_en;
    }

    public function getMissionPointsAttribute()
    {
        $points = [];
        $lang = app()->getLocale();

        if ($this->mission_point1_ar && $this->mission_point1_en) {
            $points[] = $lang === 'ar' ? $this->mission_point1_ar : $this->mission_point1_en;
        }

        if ($this->mission_point2_ar && $this->mission_point2_en) {
            $points[] = $lang === 'ar' ? $this->mission_point2_ar : $this->mission_point2_en;
        }

        if ($this->mission_point3_ar && $this->mission_point3_en) {
            $points[] = $lang === 'ar' ? $this->mission_point3_ar : $this->mission_point3_en;
        }

        return $points;
    }

    public function getStatsAttribute()
    {
        return [
            [
                'value' => $this->uptime_value,
                'label' => app()->getLocale() === 'ar' ? $this->uptime_label_ar : $this->uptime_label_en
            ],
            [
                'value' => $this->support_value,
                'label' => app()->getLocale() === 'ar' ? $this->support_label_ar : $this->support_label_en
            ],
            [
                'value' => $this->clients_value,
                'label' => app()->getLocale() === 'ar' ? $this->clients_label_ar : $this->clients_label_en
            ],
            [
                'value' => $this->experience_value,
                'label' => app()->getLocale() === 'ar' ? $this->experience_label_ar : $this->experience_label_en
            ]
        ];
    }
}
