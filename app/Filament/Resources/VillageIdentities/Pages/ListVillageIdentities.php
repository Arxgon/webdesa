<?php

namespace App\Filament\Resources\VillageIdentities\Pages;

use App\Filament\Resources\VillageIdentities\VillageIdentityResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListVillageIdentities extends ListRecords
{
    protected static string $resource = VillageIdentityResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
