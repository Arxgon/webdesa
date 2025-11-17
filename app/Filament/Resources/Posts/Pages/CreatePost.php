<?php

namespace App\Filament\Resources\Posts\Pages;

use App\Filament\Resources\Posts\PostResource;
use Filament\Resources\Pages\CreateRecord;

class CreatePost extends CreateRecord
{
    protected static string $resource = PostResource::class;


    protected function mutateFormDataBeforeCreate(array $data): array
        {
            $data['user_id'] = auth()->id();

            if (empty($data['reading_time_minutes']) && !empty($data['content'])) {
                $words = str_word_count(strip_tags($data['content']));
                $data['reading_time_minutes'] = max(1, (int) ceil($words / 200));
            }

            if (!empty($data['title']) && empty($data['slug'])) {
                $data['slug'] = \Illuminate\Support\Str::slug($data['title']);
            }

            return $data;
        }

}
