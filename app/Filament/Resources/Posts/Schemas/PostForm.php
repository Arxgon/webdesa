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
                    Tab::make('Konten')->schema([
                        Section::make()->columns(1)->schema([
                            TextInput::make('title')
                                ->label('Judul')
                                ->required()
                                ->live(onBlur: true)
                                ->afterStateUpdated(fn ($state, $set) => $set('slug', Str::slug($state))),
                            TextInput::make('slug')
                                ->label('Slug (kalimat unik)')
                                ->required()
                                ->unique(ignoreRecord: true),
                            Textarea::make('excerpt')
                                ->label('Kutipan')
                                ->rows(3)
                                ->columnSpanFull(),
                            RichEditor::make('content')
                                ->label('Konten')
                                ->required()
                                ->columnSpanFull()
                                ->extraAttributes(['style' => 'min-height: 50vh;']),
                        ])->columnSpanFull(),
                    ]),
                    Tab::make('Kategori & Tag')->schema([
                        Section::make()->columns(1)->schema([
                            Select::make('categories')
                                ->label('Kategori')
                                ->relationship('categories', 'name')
                                ->multiple()
                                ->preload()
                                ->searchable(),
                            Select::make('tags')
                                ->label('Tag')
                                ->relationship('tags', 'name')
                                ->multiple()
                                ->preload()
                                ->searchable(),
                        ])->columnSpanFull(),
                    ]),
                    Tab::make('Publikasi')->schema([
                        Section::make()->columns(1)->schema([
                            Select::make('status')
                                ->label('Status')
                                ->options([
                                    'draft' => 'Draf',
                                    'scheduled' => 'Dijadwalkan',
                                    'published' => 'Terbit',
                                    'archived' => 'Arsip',
                                ])
                                ->default('draft')
                                ->required(),
                            DateTimePicker::make('published_at')
                                ->label('Tanggal Terbit')
                                ->seconds(false),
                            Toggle::make('is_featured')->label('Sorotan'),
                            TextInput::make('reading_time_minutes')
                                ->label('Perkiraan Waktu Baca (menit)')
                                ->numeric()
                                ->minValue(1)
                                ->helperText('Opsional; otomatis dihitung saat simpan jika kosong.'),
                        ])->columnSpanFull(),
                    ]),
                    Tab::make('Media & SEO')->schema([
                        Section::make()->columns(1)->schema([
                            FileUpload::make('cover_image_url')
                                ->label('Gambar Sampul')
                                ->image()
                                ->directory('post-covers')
                                ->disk('public')
                                ->visibility('public'),
                            TextInput::make('canonical_url')
                                ->label('URL Kanonik')
                                ->url(),
                        ])->columnSpanFull(),
                    ]),
                ])->columnSpanFull(),
            ]);
    }
}
