<?php

namespace App\Filament\Resources\Posts\RelationManagers;


use App\Models\Comment;
use Filament\Forms\Components\{Select, TextInput, Textarea};
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Schemas\Schema;
use Filament\Tables\Columns\{TextColumn};
use Filament\Tables\Filters\{SelectFilter, TrashedFilter};
use Filament\Tables\Table;
use Filament\Actions\{Action, EditAction, DeleteAction, BulkActionGroup, DeleteBulkAction, ForceDeleteBulkAction, RestoreBulkAction};


class CommentsRelationManager extends RelationManager
{
    protected static string $relationship = 'comments';

    public function form(Schema $schema): Schema
    {

        return $schema->components([
            Select::make('status')
                ->options([
                    'pending'  => 'Pending',
                    'approved' => 'Approved',
                    'rejected' => 'Rejected',
                    'spam'     => 'Spam',
                ])
                ->required(),
            TextInput::make('author_name')->label('Author Name'),
            TextInput::make('author_email')->label('Author Email')->email(),
            Textarea::make('content')->rows(6)->required()->columnSpanFull(),
        ]);

    }

    public function infolist(Schema $schema): Schema
    {
        return $schema
            ->components([
                //
            ]);
    }

    public function table(Table $table): Table
    {

        return $table
            ->columns([
                TextColumn::make('author_name')->label('Author')->sortable()->searchable(),
                TextColumn::make('author_email')->label('Email')->sortable()->toggleable(),
                TextColumn::make('status')
                    ->badge()
                    ->color(fn(string $s) => match ($s) {
                        'pending' => 'warning',
                        'approved' => 'success',
                        'rejected' => 'danger',
                        'spam' => 'gray',
                        default => 'gray',
                    })
                    ->sortable(),
                TextColumn::make('content')
                    ->label('Preview')
                    ->limit(60)
                    ->wrap()
                    ->toggleable(),
                TextColumn::make('created_at')->dateTime('d M Y H:i')->sortable(),
            ])
            ->defaultSort('created_at', 'desc')
            ->filters([
                SelectFilter::make('status')->options([
                    'pending'  => 'Pending',
                    'approved' => 'Approved',
                    'rejected' => 'Rejected',
                    'spam'     => 'Spam',
                ]),
                TrashedFilter::make(),
            ])
            ->headerActions([
                // memungkinkan admin membuat komentar baru pada post ini
                \Filament\Actions\CreateAction::make(),
            ])
            ->recordActions([
                Action::make('approve')
                    ->label('Approve')->color('success')
                    ->requiresConfirmation()
                    ->action(fn(Comment $record) => $record->update(['status' => 'approved']))
                    ->visible(fn(Comment $record) => $record->status !== 'approved'),

                Action::make('reject')
                    ->label('Reject')->color('danger')
                    ->requiresConfirmation()
                    ->action(fn(Comment $record) => $record->update(['status' => 'rejected']))
                    ->visible(fn(Comment $record) => $record->status !== 'rejected'),

                Action::make('spam')
                    ->label('Mark Spam')->color('gray')
                    ->requiresConfirmation()
                    ->action(fn(Comment $record) => $record->update(['status' => 'spam']))
                    ->visible(fn(Comment $record) => $record->status !== 'spam'),

                EditAction::make(),
                DeleteAction::make(),
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
