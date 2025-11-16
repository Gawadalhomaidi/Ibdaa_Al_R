<?php

namespace App\Filament\Resources\AboutSections\Schemas;

use Filament\Infolists\Components\IconEntry;
use Filament\Infolists\Components\ImageEntry;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class AboutSectionsInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('sections.name_en'),
                TextEntry::make('title_ar'),
                TextEntry::make('title_en'),
                TextEntry::make('description_ar')
                    ->columnSpanFull(),
                TextEntry::make('description_en')
                    ->columnSpanFull(),
                TextEntry::make('mission_title_ar'),
                TextEntry::make('mission_title_en'),
                TextEntry::make('mission_description_ar')
                    ->columnSpanFull(),
                TextEntry::make('mission_description_en')
                    ->columnSpanFull(),
                TextEntry::make('mission_point1_ar')
                    ->columnSpanFull(),
                TextEntry::make('mission_point1_en')
                    ->columnSpanFull(),
                TextEntry::make('mission_point2_ar')
                    ->columnSpanFull(),
                TextEntry::make('mission_point2_en')
                    ->columnSpanFull(),
                TextEntry::make('mission_point3_ar')
                    ->columnSpanFull(),
                TextEntry::make('mission_point3_en')
                    ->columnSpanFull(),
                TextEntry::make('why_choose_us_title_ar'),
                TextEntry::make('why_choose_us_title_en'),
                TextEntry::make('why_choose_us_description_ar')
                    ->columnSpanFull(),
                TextEntry::make('why_choose_us_description_en')
                    ->columnSpanFull(),
                TextEntry::make('uptime_value'),
                TextEntry::make('uptime_label_ar'),
                TextEntry::make('uptime_label_en'),
                TextEntry::make('support_value'),
                TextEntry::make('support_label_ar'),
                TextEntry::make('support_label_en'),
                TextEntry::make('clients_value'),
                TextEntry::make('clients_label_ar'),
                TextEntry::make('clients_label_en'),
                TextEntry::make('experience_value'),
                TextEntry::make('experience_label_ar'),
                TextEntry::make('experience_label_en'),
                ImageEntry::make('background_image')
                    ->placeholder('-'),
                ImageEntry::make('mission_background_image')
                    ->placeholder('-'),
                ImageEntry::make('stats_background_image')
                    ->placeholder('-'),
                TextEntry::make('order')
                    ->numeric(),
                IconEntry::make('show_mission')
                    ->boolean(),
                IconEntry::make('show_stats')
                    ->boolean(),
                IconEntry::make('is_active')
                    ->boolean(),
                TextEntry::make('created_at')
                    ->dateTime()
                    ->placeholder('-'),
                TextEntry::make('updated_at')
                    ->dateTime()
                    ->placeholder('-'),
            ]);
    }
}
