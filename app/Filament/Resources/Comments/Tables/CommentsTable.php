<?php

namespace App\Filament\Resources\Comments\Tables;

use App\Models\Comment;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ForceDeleteBulkAction;
use Filament\Actions\RestoreBulkAction;
use Filament\Actions\Action;
use Filament\Tables\Table;

use Filament\Tables\Columns\{TextColumn};
use Filament\Tables\Filters\{SelectFilter, TrashedFilter};

class CommentsTable
{
    protected static ?string $model = Comment::class;
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([

                TextColumn::make('commentable.title')->label('On Post')->sortable()->searchable(),
                TextColumn::make('author_name')->label('Author')->sortable()->toggleable(),
                TextColumn::make('author_email')->label('Email')->sortable()->toggleable(),
                TextColumn::make('status')->badge()->color(fn ($s) => match ($s) {
                    'pending' => 'warning',
                    'approved' => 'success',
                    'rejected' => 'danger',
                    'spam' => 'gray',
                    default => 'gray',
                })->sortable(),
                TextColumn::make('created_at')->dateTime('d M Y H:i')->sortable(),

            ])
            ->filters([

                SelectFilter::make('status')->options([
                    'pending'  => 'Pending',
                    'approved' => 'Approved',
                    'rejected' => 'Rejected',
                    'spam'     => 'Spam',
                ]),

                TrashedFilter::make(),
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
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                    ForceDeleteBulkAction::make(),
                    RestoreBulkAction::make(),
                ]),
            ]);
    }


    public static function getPages(): array
    {
        return [
            'index' => Pages\ListComments::route('/'),
            'edit'  => Pages\EditComment::route('/{record}/edit'),
        ];
    }

}
