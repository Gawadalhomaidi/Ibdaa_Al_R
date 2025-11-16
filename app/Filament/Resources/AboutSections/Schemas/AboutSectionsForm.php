<?php

namespace App\Filament\Resources\AboutSections\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\Select;
use Filament\Schemas\Schema;

class AboutSectionsForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('section_id')
                    ->relationship('sections','name_en'),
                TextInput::make('title_ar')
                    ->required(),
                TextInput::make('title_en')
                    ->required(),
                Textarea::make('description_ar')
                    ->required()
                    ->columnSpanFull(),
                Textarea::make('description_en')
                    ->required()
                    ->columnSpanFull(),
                TextInput::make('mission_title_ar')
                    ->required(),
                TextInput::make('mission_title_en')
                    ->required(),
                Textarea::make('mission_description_ar')
                    ->required()
                    ->columnSpanFull(),
                Textarea::make('mission_description_en')
                    ->required()
                    ->columnSpanFull(),
                Textarea::make('mission_point1_ar')
                    ->required()
                    ->columnSpanFull(),
                Textarea::make('mission_point1_en')
                    ->required()
                    ->columnSpanFull(),
                Textarea::make('mission_point2_ar')
                    ->required()
                    ->columnSpanFull(),
                Textarea::make('mission_point2_en')
                    ->required()
                    ->columnSpanFull(),
                Textarea::make('mission_point3_ar')
                    ->required()
                    ->columnSpanFull(),
                Textarea::make('mission_point3_en')
                    ->required()
                    ->columnSpanFull(),
                TextInput::make('why_choose_us_title_ar')
                    ->required(),
                TextInput::make('why_choose_us_title_en')
                    ->required(),
                Textarea::make('why_choose_us_description_ar')
                    ->required()
                    ->columnSpanFull(),
                Textarea::make('why_choose_us_description_en')
                    ->required()
                    ->columnSpanFull(),
                TextInput::make('uptime_value')
                    ->required()
                    ->default('99.9%'),
                TextInput::make('uptime_label_ar')
                    ->required(),
                TextInput::make('uptime_label_en')
                    ->required(),
                TextInput::make('support_value')
                    ->required()
                    ->default('24/7'),
                TextInput::make('support_label_ar')
                    ->required(),
                TextInput::make('support_label_en')
                    ->required(),
                TextInput::make('clients_value')
                    ->required()
                    ->default('500+'),
                TextInput::make('clients_label_ar')
                    ->required(),
                TextInput::make('clients_label_en')
                    ->required(),
                TextInput::make('experience_value')
                    ->required()
                    ->default('5+'),
                TextInput::make('experience_label_ar')
                    ->required(),
                TextInput::make('experience_label_en')
                    ->required(),
                FileUpload::make('background_image')
                    ->image(),
                FileUpload::make('mission_background_image')
                    ->image(),
                FileUpload::make('stats_background_image')
                    ->image(),
                TextInput::make('order')
                    ->required()
                    ->numeric()
                    ->default(0),
                Toggle::make('show_mission')
                    ->required(),
                Toggle::make('show_stats')
                    ->required(),
                Toggle::make('is_active')
                    ->required(),
            ]);
    }
}
