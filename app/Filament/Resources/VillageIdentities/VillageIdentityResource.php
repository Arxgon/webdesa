<?php

namespace App\Filament\Resources\VillageIdentities;

use App\Filament\Resources\VillageIdentities\Schemas\VillageIdentityForm;
use App\Filament\Resources\VillageIdentities\Tables\VillageIdentitiesTable;
use App\Filament\Resources\VillageIdentityResource\Pages\ManageVillageIdentity;
use App\Models\VillageIdentity;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use UnitEnum;

class VillageIdentityResource extends Resource
{
    protected static ?string $model = VillageIdentity::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::BuildingOffice;

    protected static ?string $navigationLabel = 'Identitas Desa';

    protected static ?string $modelLabel = 'Identitas Desa';

    protected static string | UnitEnum | null $navigationGroup = 'Info Desa';

    public static function form(Schema $schema): Schema
    {
        return VillageIdentityForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return VillageIdentitiesTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ManageVillageIdentity::route('/'),
        ];
    }
}
