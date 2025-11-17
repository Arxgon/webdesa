<?php

namespace App\Filament\Resources\Albums\Schemas;

use Filament\Schemas\Schema;

use Filament\Schemas\Components\{Section, Tabs};
use Filament\Schemas\Components\Tabs\Tab;
use Filament\Forms\Components\{TextInput, Textarea, DateTimePicker, Toggle, Select, FileUpload};
use Illuminate\Support\Str;

class AlbumForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([

            Tabs::make('AlbumTabs')->tabs([
                Tab::make('Informasi')->schema([
                    Section::make()->columns(2)->schema([
                        TextInput::make('title')
                            ->label('Judul')
                            ->required()
                            ->live(onBlur: true)
                            ->afterStateUpdated(fn($state, $set) => $set('slug', Str::slug($state))),
                        TextInput::make('slug')->label('Slug')->required()->unique(ignoreRecord: true),
                        Textarea::make('description')->label('Deskripsi')->rows(4)->columnSpanFull(),
                    ]),
                ]),
                Tab::make('Publikasi')->schema([
                    Section::make()->columns(2)->schema([
                        Select::make('status')->label('Status')->options([
                            'draft' => 'Draft',
                            'scheduled' => 'Terjadwal',
                            'published' => 'Terbit',
                            'archived' => 'Arsip',
                        ])->default('draft')->required(),
                        DateTimePicker::make('published_at')->label('Waktu Terbit')->seconds(false),
                        Toggle::make('is_featured')->label('Sorotan'),
                    ]),
                ]),
                Tab::make('Sampul')->schema([
                    Section::make()->columns(1)->schema([
                        FileUpload::make('cover_image_url')
                            ->label('Gambar Sampul')
                            ->image()
                            ->directory('album-covers')
                            ->disk('public')
                            ->visibility('public'),
                    ]),
                ]),

                Tab::make('Unggah Massal')->schema([
                    FileUpload::make('temporary_images')
                    ->label('Foto (banyak)')
                    ->image()
                    ->multiple()        // simpan array JSON di state
                    ->reorderable()     // tata ulang tampilan grid (opsional)
                    ->directory('albums/photos/tmp')
                    ->disk('public')
                    ->visibility('public')
                    ->helperText('Unggah beberapa foto lalu simpan; sistem akan membuat item Foto per file.'),
                ])

            ]),

            ]);
    }
}
