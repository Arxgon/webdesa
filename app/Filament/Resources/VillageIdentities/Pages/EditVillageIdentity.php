<?php

namespace App\Filament\Resources\VillageIdentities\Pages;

use App\Filament\Resources\VillageIdentities\VillageIdentityResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditVillageIdentity extends EditRecord
{
    protected static string $resource = VillageIdentityResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
