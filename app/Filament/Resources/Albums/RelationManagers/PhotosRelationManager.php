<?php

namespace App\Filament\Resources\Albums\RelationManagers;

use App\Models\Photo;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Schemas\Schema;
use Filament\Forms\Components\{TextInput, Textarea, FileUpload, DateTimePicker, TextInput as Input};
use Filament\Tables\Table;
use Filament\Tables\Columns\{TextColumn, ImageColumn, IconColumn};
use Filament\Tables\Filters\SelectFilter;
use Filament\Actions\{EditAction, DeleteAction, BulkActionGroup, DeleteBulkAction, ForceDeleteBulkAction, RestoreBulkAction};

class PhotosRelationManager extends RelationManager
{
    protected static string $relationship = 'photos';
    protected static ?string $title = 'Foto';

    public function form(Schema $schema): Schema
    {
        return $schema->components([
            FileUpload::make('image_path')
                ->label('File Foto')
                ->image()
                ->directory('albums/photos')
                ->disk('public')
                ->visibility('public')
                ->required(),
            TextInput::make('title')->label('Judul')->maxLength(255),
            Textarea::make('caption')->label('Keterangan')->rows(3),
            DateTimePicker::make('taken_at')->label('Waktu Pengambilan')->seconds(false),
            Input::make('location')->label('Lokasi')->maxLength(255),
            Input::make('order')->label('Urutan')->numeric()->default(0),
            \Filament\Forms\Components\Select::make('status')->label('Status')->options([
                'visible' => 'Tampil',
                'hidden'  => 'Sembunyi',
            ])->default('visible'),
        ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('image_path')->label('Foto')->disk('public')->square(),
                TextColumn::make('title')->label('Judul')->limit(20),
                TextColumn::make('order')->label('Urut')->sortable(),
                IconColumn::make('status')->boolean()
                    ->label('Tampil')->trueIcon('heroicon-o-eye')->falseIcon('heroicon-o-eye-slash')
                    ->getStateUsing(fn(Photo $r) => $r->status === 'visible'),
                TextColumn::make('taken_at')->label('Diambil')->dateTime('d M Y H:i')->sortable(),
            ])
            ->filters([
                SelectFilter::make('status')->options(['visible'=>'Tampil','hidden'=>'Sembunyi']),
            ])
            ->headerActions([ \Filament\Actions\CreateAction::make()->label('Tambah Foto') ])
            ->recordActions([
                EditAction::make(),
                DeleteAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(), ForceDeleteBulkAction::make(), RestoreBulkAction::make(),
                ]),
            ]);
    }
}
