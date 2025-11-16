<?php

namespace App\Filament\Resources\Features\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\Select;
use Filament\Schemas\Schema;

class FeaturesForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('section_id')
                    ->label(__('section'))
                    ->relationship('sections','name_en'),
                TextInput::make('title_ar')
                    ->label(__('title_ar'))
                    ->required(),
                TextInput::make('title_en')
                    ->label(__('title_en'))
                    ->required(),
                Textarea::make('description_ar')
                    ->label(__('description_ar'))
                    ->default(null)
                    ->columnSpanFull(),
                Textarea::make('description_en')
                    ->label(__('description_en'))
                    ->default(null)
                    ->columnSpanFull(),
                TextInput::make('icon')
                    ->label(__('icon'))
                    ->required(),
                FileUpload::make('background_image')
                    ->label(__('background_image'))
                    ->image(),
                TextInput::make('order')
                    ->label(__('order'))
                    ->required()
                    ->numeric()
                    ->default(0),
                Toggle::make('is_active')
                    ->label(__('is_active'))
                    ->required(),
            ]);
    }
}
