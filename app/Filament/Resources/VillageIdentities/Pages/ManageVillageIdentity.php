<?php

namespace App\Filament\Resources\VillageIdentityResource\Pages;

use App\Filament\Resources\VillageIdentities\VillageIdentityResource;
use App\Models\VillageIdentity;
use Filament\Resources\Pages\EditRecord;

class ManageVillageIdentity extends EditRecord
{
    protected static string $resource = VillageIdentityResource::class;

    public function mount($record = null): void
    {
        // Ambil atau buat 1 record tunggal
        $first = VillageIdentity::first();
        if (! $first) {
            $first = VillageIdentity::create(['nama_desa' => '']);
        }

        // Set record & teruskan ke parent
        $this->record = $first;
        parent::mount($this->record->getKey());
    }

    protected function getHeaderHeading(): string
    {
        return 'Identitas Desa';
    }

    protected function getRedirectUrl(): string
    {
        // Setelah simpan, tetap di halaman ini
        return static::getResource()::getUrl();
    }
}
