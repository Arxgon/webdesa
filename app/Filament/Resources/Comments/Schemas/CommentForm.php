<?php

namespace App\Filament\Resources\Comments\Schemas;

use Filament\Schemas\Schema;

use Filament\Schemas\Components\Section;
use Filament\Forms\Components\{Textarea, Select, TextInput};

class CommentForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([

                Section::make()->columns(2)->schema([
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
                ]),
//
            ]);
    }
}
