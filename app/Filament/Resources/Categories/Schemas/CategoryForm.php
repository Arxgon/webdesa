<?php

namespace App\Filament\Resources\Categories\Schemas;

use Filament\Schemas\Schema;

use Filament\Schemas\Components\Section;
use Filament\Forms\Components\{TextInput, Textarea, Select};
use Illuminate\Support\Str;

class CategoryForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([

            Section::make()->columns(2)->schema([
                TextInput::make('name')
                    ->required()
                    ->live(onBlur: true)
                    ->afterStateUpdated(fn($state, $set) => $set('slug', Str::slug($state))),
                TextInput::make('slug')->required()->unique(ignoreRecord: true),
                Select::make('parent_id')
                    ->label('Parent')
                    ->relationship('parent', 'name')
                    ->searchable()->preload(),
                TextInput::make('order')->numeric()->minValue(0)->default(0),
                Textarea::make('description')->rows(4)->columnSpanFull(),
            ]),
        ]);
    }
}
