<?php

namespace App\Filament\Resources\Posts\Pages;

use App\Filament\Resources\Posts\PostResource;
use Filament\Actions\DeleteAction;
use Filament\Actions\ForceDeleteAction;
use Filament\Actions\RestoreAction;
use Filament\Actions\ViewAction;
use Filament\Resources\Pages\EditRecord;

class EditPost extends EditRecord
{
    protected static string $resource = PostResource::class;


    protected function mutateFormDataBeforeSave(array $data): array
    {
        if (empty($data['reading_time_minutes']) && !empty($data['content'])) {
            $words = str_word_count(strip_tags($data['content']));
            $data['reading_time_minutes'] = max(1, (int) ceil($words / 200));
        }

        return $data;
    }


    protected function getHeaderActions(): array
    {
        return [
            ViewAction::make(),
            DeleteAction::make(),
            ForceDeleteAction::make(),
            RestoreAction::make(),
        ];
    }
}
