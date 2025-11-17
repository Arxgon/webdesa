<?php

namespace App\Filament\Resources\Users\Schemas;

use Filament\Forms\Components\DateTimePicker;
use Filament\Schemas\Schema;
use Filament\Schemas\Components\Section;
use Filament\Forms\Components\{TextInput, FileUpload, Textarea, Select};
use Illuminate\Support\Facades\Hash;
use Filament\Forms\Components\SpatieMediaLibraryFileUpload;

class UserForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([

                Section::make('Profile')->columns(2)->schema([
                // FileUpload::make('avatar_url')
                //     ->label('Avatar')
                //     ->image()
                //     ->directory('avatars')
                //     ->disk('public')
                //     ->visibility('public'),

                SpatieMediaLibraryFileUpload::make('avatars')
                    ->label('Avatar')
                    ->collection('avatars')
                    ->image()
                    ->maxFiles(1)
                    ->responsiveImages()
                    ->conversion('thumb'),
                TextInput::make('name')->required(),
                TextInput::make('username')->required()->unique(ignoreRecord: true),
                TextInput::make('email')->email()->required()->unique(ignoreRecord: true),
                Textarea::make('bio')->rows(3)->columnSpanFull(),
            ]),

            Section::make('Security & Roles')->columns(2)->schema([
                TextInput::make('password')
                    ->password()
                    ->revealable()
                    ->dehydrateStateUsing(fn($state) => filled($state) ? Hash::make($state) : null)
                    ->dehydrated(fn($state) => filled($state))
                    ->required(fn(string $operation): bool => $operation === 'create')
                    ->minLength(8),
                Select::make('roles')
                    ->relationship('roles', 'name')
                    ->multiple()
                    ->preload()
                    ->label('Roles (Spatie Permission)'),
            ]),

        ]);
    }
}
