<?php

namespace App\Filament\Resources\Posts\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ForceDeleteBulkAction;
use Filament\Actions\RestoreBulkAction;
use Filament\Actions\ViewAction;
use Filament\Tables\Filters\TrashedFilter;
use Filament\Tables\Table;

use Filament\Tables\Columns\{TextColumn, IconColumn, ImageColumn};

class PostsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([

                ImageColumn::make('cover_image_url')
                    ->label('Cover')
                    ->disk('public')
                    ->square()
                    ->toggleable(),
                TextColumn::make('title')->sortable()->searchable(),
                TextColumn::make('author.name')->label('Author')->sortable(),
                TextColumn::make('status')
                    ->badge()
                    ->color(fn (string $state) => match ($state) {
                        'draft' => 'warning',
                        'scheduled' => 'info',
                        'published' => 'success',
                        'archived' => 'gray',
                        default => 'gray',
                    })
                    ->sortable(),
                IconColumn::make('is_featured')->label('Featured')->boolean()->sortable(),
                TextColumn::make('published_at')->dateTime('d M Y H:i')->sortable(),
                // v4: gunakan TextColumn dengan separator untuk relasi many-to-many
                TextColumn::make('categories.name')->label('Categories')->badge()->separator(', ')->toggleable(),
                TextColumn::make('tags.name')->label('Tags')->badge()->separator(', ')->toggleable(),
                TextColumn::make('updated_at')->dateTime('d M Y H:i')->sortable()->toggleable(),
            ])
            ->filters([
                TrashedFilter::make(),
            ])
            ->recordActions([
                ViewAction::make(),
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
