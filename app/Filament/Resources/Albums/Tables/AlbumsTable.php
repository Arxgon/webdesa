<?php

namespace App\Filament\Resources\Albums\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ForceDeleteBulkAction;
use Filament\Actions\RestoreBulkAction;
use Filament\Tables\Table;

use Filament\Tables\Columns\{TextColumn, ImageColumn, IconColumn};
use Filament\Tables\Filters\{SelectFilter, TrashedFilter};

class AlbumsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([

                ImageColumn::make('cover_image_url')->label('Sampul')->disk('public')->square()->toggleable(),
                TextColumn::make('title')->label('Judul')->sortable()->searchable(),
                TextColumn::make('author.name')->label('Penulis')->sortable(),
                TextColumn::make('status')->badge()
                    ->color(fn($s) => match ($s) {
                        'draft' => 'warning', 'scheduled' => 'info', 'published' => 'success', 'archived' => 'gray', default => 'gray',
                    })->sortable(),
                IconColumn::make('is_featured')->label('Sorotan')->boolean()->sortable(),
                TextColumn::make('published_at')->label('Terbit')->dateTime('d M Y H:i')->sortable(),
                TextColumn::make('photos_count')->counts('photos')->label('Foto'),
            ])
            ->filters([

                SelectFilter::make('status')->options([
                    'draft' => 'Draft','scheduled'=>'Terjadwal','published'=>'Terbit','archived'=>'Arsip',
                ]),

                TrashedFilter::make(),
            ])
            ->recordActions([
                EditAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                    ForceDeleteBulkAction::make(),
                    RestoreBulkAction::make(),
                ]),
            ]);
    }
}
