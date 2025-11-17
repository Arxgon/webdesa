<?php

namespace App\Filament\Resources\AlbumResource\RelationManagers;

use App\Models\Comment;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Schemas\Schema;
use Filament\Forms\Components\{Textarea, TextInput, Select};
use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;
use Filament\Actions\{Action, EditAction, DeleteAction};

class AlbumCommentsRelationManager extends RelationManager
{
    protected static string $relationship = 'comments';
    protected static ?string $title = 'Komentar';

    public function form(Schema $schema): Schema
    {
        return $schema->components([
            Select::make('status')->options([
                'pending'=>'Pending','approved'=>'Approved','rejected'=>'Rejected','spam'=>'Spam',
            ])->required(),
            TextInput::make('author_name')->label('Nama'),
            TextInput::make('author_email')->label('Email')->email(),
            Textarea::make('content')->label('Isi')->rows(5)->required(),
        ]);
    }

    public function table(Table $table): Table
    {
        return $table->columns([
            TextColumn::make('author_name')->label('Nama'),
            TextColumn::make('author_email')->label('Email'),
            TextColumn::make('status')->badge()->label('Status'),
            TextColumn::make('content')->label('Komentar')->limit(60)->wrap(),
            TextColumn::make('created_at')->label('Dibuat')->dateTime('d M Y H:i')->sortable(),
        ])->recordActions([
            Action::make('approve')->label('Approve')->color('success')
                ->action(fn(Comment $r) => $r->update(['status'=>'approved']))
                ->visible(fn(Comment $r) => $r->status !== 'approved'),
            Action::make('reject')->label('Reject')->color('danger')
                ->action(fn(Comment $r) => $r->update(['status'=>'rejected']))
                ->visible(fn(Comment $r) => $r->status !== 'rejected'),
            Action::make('spam')->label('Spam')->color('gray')
                ->action(fn(Comment $r) => $r->update(['status'=>'spam']))
                ->visible(fn(Comment $r) => $r->status !== 'spam'),
            EditAction::make(),
            DeleteAction::make(),
        ]);
    }
}
