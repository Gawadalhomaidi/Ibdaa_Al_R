<?php

namespace App\Filament\Resources\Users;

use App\Enums\UserStatus;
use App\Filament\Resources\Users\Pages\ManageUsers;
use App\Models\User;
use BackedEnum;
use Filament\Actions\ActionGroup;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Infolists\Components\ImageEntry;
use Filament\Infolists\Components\TextEntry;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\SelectColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\TextInputColumn;
use Filament\Tables\Table;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Filters\Filter;
use Filament\Tables\Filters\TernaryFilter;
use Illuminate\Database\Eloquent\Builder;

class UserResource extends Resource
{
    protected static ?string $model = User::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedUser;

    protected static string|\UnitEnum|null $navigationGroup = 'Setting';
        public static function getNavigationLabel(): string
    {
        return __('Users');
    }
    protected static ?int $navigationSort = 1;

    public static function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->label(__('name'))
                    ->required(),
                TextInput::make('email')
                    ->label(__('email'))
                    ->email()
                    ->required(),
                DateTimePicker::make('email_verified_at')
                    ->label(__('email_verified_at')),
                TextInput::make('password')
                    ->label(__('password'))
                    ->password()
                    ->required(),
                TextInput::make('username')
                    ->label(__('username'))
                    ->required(),
                Select::make('status')
                    ->label(__('status'))
                    ->options(UserStatus::class)
                    ->default(UserStatus::INACTIVE)
                    ->required(),
                DateTimePicker::make('last_login')
                    ->label(__('last_login')),
                FileUpload::make('profile_image')
                    ->label(__('profile_image'))
                    ->image()
                    ->required(),
                TextInput::make('phone')
                    ->label(__('phone'))
                    ->tel()
                    ->default(null),
                DatePicker::make('date_of_birth')
                    ->label(__('date_of_birth')),
                Select::make('gender')
                    ->label(__('gender'))
                    ->options(['male' => 'Male', 'female' => 'Female', 'other' => 'Other'])
                    ->default(null),
                Select::make('Roles')
                    ->label(__('Roles'))
                    ->multiple()
                    ->relationship('Roles', 'name')
                    ->preload(),
                Select::make('Permissions')
                    ->label(__('Permissions'))
                    ->multiple()
                    ->relationship('Permissions', 'name')
                    ->preload(),
            ]);
    }

    public static function infolist(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('name')
                    ->label(__('name')),
                TextEntry::make('email')
                    ->label(__('email')),
                TextEntry::make('email_verified_at')
                    ->label(__('email_verified_at'))
                    ->dateTime()
                    ->placeholder('-'),
                TextEntry::make('username')
                    ->label(__('username')),
                TextEntry::make('status')
                    ->label(__('status'))
                    ->badge()
                    ->color(fn(UserStatus $state): string => $state->getColor())
                    ->formatStateUsing(fn(UserStatus $state): string => $state->getLabel()),
                TextEntry::make('last_login')
                    ->label(__('last_login'))
                    ->dateTime()
                    ->placeholder('-'),
                ImageEntry::make('profile_image')
                    ->label(__('profile_image')),
                TextEntry::make('phone')
                    ->label(__('phone'))
                    ->placeholder('-'),
                TextEntry::make('date_of_birth')
                    ->label(__('date_of_birth'))
                    ->date()
                    ->placeholder('-'),
                TextEntry::make('gender')
                    ->label(__('gender'))
                    ->badge()
                    ->placeholder('-'),
                TextEntry::make('created_at')
                    ->label(__('created_at'))
                    ->dateTime()
                    ->placeholder('-'),
                TextEntry::make('updated_at')
                    ->label(__('updated_at'))
                    ->dateTime()
                    ->placeholder('-'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextInputColumn::make('name')
                    ->label(__('name'))
                    // ->url(fn (User $record): string => UserResource::getUrl('view', ['record' => $record]))
                   ->rules(['required','string','max:255','min:3']),
                TextColumn::make('email')
                    ->label(__('email'))
                    ->searchable(),
                TextColumn::make('email_verified_at')
                    ->label(__('email_verified_at'))
                    ->dateTime('d-m-Y H:i')
                    ->sortable(),
                TextColumn::make('username')
                    ->label(__('username'))
                    ->searchable(),
                SelectColumn::make('status')
                    ->label(__('status'))
                    ->searchableOptions()
                    ->options(UserStatus::class),
                // TextColumn::make('status')
                //     ->badge()
                //     ->color(fn(UserStatus $state): string => $state->getColor())
                //     ->formatStateUsing(fn(UserStatus $state): string => $state->getLabel())
                //     ->sortable(),
                TextColumn::make('last_login')
                    ->label(__('last_login'))
                    ->date()
                    ->sortable(),
                ImageColumn::make('profile_image')
                    ->label(__('profile_image')),
                TextColumn::make('phone')
                    ->label(__('phone'))
                    ->searchable(),
                TextColumn::make('date_of_birth')
                    ->label(__('date_of_birth'))
                    ->date()
                    ->sortable(),
                TextColumn::make('gender')
                    ->label(__('gender'))
                    ->badge(),
                TextColumn::make('created_at')
                    ->label(__('created_at'))
                    ->since()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('updated_at')
                    ->label(__('updated_at'))
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                SelectFilter::make('status')
                    ->label(__('Status'))
                    ->options(UserStatus::class)
                    ->searchable(),
                    
                SelectFilter::make('gender')
                    ->options([
                        'male' => 'Male',
                        'female' => 'Female', 
                        'other' => 'Other',
                    ])
                    ->label(__('gender'))
                    ->searchable(),
                    
                TernaryFilter::make('email_verified_at')
                    ->label(__('email_verified_at'))
                    ->nullable()
                    ->trueLabel('Verified')
                    ->falseLabel('Not Verified'),
                    
                Filter::make('last_login')
                    ->form([
                        DatePicker::make('last_login_from')
                            ->placeholder('YYYY-MM-DD'),
                        DatePicker::make('last_login_until')
                            ->placeholder('YYYY-MM-DD'),
                    ])
                    ->query(function (Builder $query, array $data): Builder {
                        return $query
                            ->when(
                                $data['last_login_from'],
                                fn (Builder $query, $date): Builder => $query->whereDate('last_login', '>=', $date),
                            )
                            ->when(
                                $data['last_login_until'],
                                fn (Builder $query, $date): Builder => $query->whereDate('last_login', '<=', $date),
                            );
                    }),
                    
                Filter::make('created_at')
                    ->form([
                        DatePicker::make('created_from')
                            ->placeholder('YYYY-MM-DD'),
                        DatePicker::make('created_until')
                            ->placeholder('YYYY-MM-DD'),
                    ])
                    ->query(function (Builder $query, array $data): Builder {
                        return $query
                            ->when(
                                $data['created_from'],
                                fn (Builder $query, $date): Builder => $query->whereDate('created_at', '>=', $date),
                            )
                            ->when(
                                $data['created_until'],
                                fn (Builder $query, $date): Builder => $query->whereDate('created_at', '<=', $date),
                            );
                    }),
            ])
            ->recordActions([
                ActionGroup::make([

                ViewAction::make(),
                EditAction::make(),
                DeleteAction::make(),
                ]
                )
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => ManageUsers::route('/'),
        ];
    }
}