<?php

namespace App\Filament\Resources\Posts\Schemas;

use Filament\Schemas\Schema;

use Filament\Forms\Components\{TextInput, Textarea, RichEditor, Select, Toggle, DateTimePicker, FileUpload};
use Filament\Schemas\Components\{Section, Tabs};
use Filament\Schemas\Components\Tabs\Tab;

use Illuminate\Support\Str;

class PostForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([

            Tabs::make('PostTabs')->tabs([
                Tab::make('Content')->schema([
                    Section::make()->columns(2)->schema([
                        TextInput::make('title')
                            ->required()
                            ->live(onBlur: true)
                            ->afterStateUpdated(fn ($state, $set) => $set('slug', Str::slug($state))),
                        TextInput::make('slug')
                            ->required()
                            ->unique(ignoreRecord: true),
                        Textarea::make('excerpt')->rows(3)->columnSpanFull(),
                        RichEditor::make('content')
                            ->required()
                            ->columnSpanFull(),
                    ]),
                ]),
                Tab::make('Taxonomy')->schema([
                    Section::make()->columns(2)->schema([
                        Select::make('categories')
                            ->relationship('categories', 'name')
                            ->multiple()
                            ->preload()
                            ->searchable()
                            ->label('Categories'),
                        Select::make('tags')
                            ->relationship('tags', 'name')
                            ->multiple()
                            ->preload()
                            ->searchable()
                            ->label('Tags'),
                    ]),
                ]),
                Tab::make('Publishing')->schema([
                    Section::make()->columns(2)->schema([
                        Select::make('status')
                            ->options([
                                'draft' => 'Draft',
                                'scheduled' => 'Scheduled',
                                'published' => 'Published',
                                'archived' => 'Archived',
                            ])
                            ->default('draft')
                            ->required(),
                        DateTimePicker::make('published_at')->seconds(false),
                        Toggle::make('is_featured')->label('Featured'),
                        TextInput::make('reading_time_minutes')
                            ->numeric()
                            ->minValue(1)
                            ->helperText('Opsional; otomatis dihitung saat simpan jika kosong.'),
                    ]),
                ]),
                Tab::make('Media / SEO')->schema([
                    Section::make()->columns(2)->schema([
                        FileUpload::make('cover_image_url')
                            ->image()
                            ->directory('post-covers')
                            ->disk('public')
                            ->visibility('public')
                            ->label('Cover Image'),
                        TextInput::make('canonical_url')->url()->label('Canonical URL'),
                    ]),
                ]),
            ]),
            ]);
    }
}
