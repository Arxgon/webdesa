<?php

namespace App\Filament\Resources\Albums\Pages;

use App\Filament\Resources\Albums\AlbumResource;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Support\Facades\Auth;

class CreateAlbum extends CreateRecord
{
    protected static string $resource = AlbumResource::class;


    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $data['user_id'] = Auth::id();
        return $data;
    }

    protected function afterCreate(): void
    {
        $images = $this->form->getRawState()['temporary_images'] ?? [];
        foreach ($images as $i => $path) {
            $this->record->photos()->create([
                'user_id'    => Auth::id(),
                'image_path' => $path,
                'order'      => $i,
                'status'     => 'visible',
            ]);
        }
        // opsional: set cover dari foto pertama
        if (!$this->record->cover_image_url && !empty($images)) {
            $this->record->update(['cover_image_url' => $images[0]]);
        }
    }

}
