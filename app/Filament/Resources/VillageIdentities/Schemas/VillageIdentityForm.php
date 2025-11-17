<?php

namespace App\Filament\Resources\VillageIdentities\Schemas;

use Filament\Schemas\Schema;

use Filament\Schemas\Components\{Flex, Section, Grid};
use Filament\Forms\Components\{TextInput, Textarea};

use Filament\Forms\Components\SpatieMediaLibraryFileUpload;

class VillageIdentityForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                    Section::make('Lambang & Kantor Desa')
                    ->description('Kosongkan jika logo/foto tidak berubah')
                    ->schema([
                        SpatieMediaLibraryFileUpload::make('logo')
                            ->label('Lambang Desa')
                            ->collection('logo')
                            ->image()
                            ->conversion('square')     // pastikan konversi ada di model
                            ->maxFiles(1)
                            ->helperText('Unggah lambang resmi desa (disarankan rasio 1:1).'),

                        SpatieMediaLibraryFileUpload::make('office_photo')
                            ->label('Kantor Desa')
                            ->collection('office_photo')
                            ->image()
                            ->conversion('thumb')      // pastikan konversi ada di model
                            ->maxFiles(1)
                            ->helperText('Foto tampak depan kantor desa (opsional).'),
                    ])
                    ->columnSpanFull(),

                    Section::make([
                        Section::make('Data Administratif')
                        ->schema([

                            TextInput::make('nama_desa')
                                ->label('Nama Desa')
                                ->required()
                                ->maxLength(191)
                                ->placeholder('Contoh: Desa Sukamaju'),

                            Grid::make(3)->schema([
                                TextInput::make('kode_desa')
                                    ->label('Kode Desa')
                                    ->maxLength(50)
                                    ->placeholder('Contoh: 3372010001'),

                                TextInput::make('kode_pos')
                                    ->label('Kode POS')
                                    ->maxLength(20)
                                    ->placeholder('Contoh: 54321'),

                                TextInput::make('kepala_desa')
                                    ->label('Kepala Desa')
                                    ->maxLength(191)
                                    ->placeholder('Nama Kepala Desa'),
                            ]),

                            Textarea::make('alamat_kantor')
                                ->label('Alamat Kantor')
                                ->rows(2)
                                ->placeholder('Jl. Raya ... RT/RW ..., Dusun ..., Desa ..., Kec. ..., Kab. ...'),

                            Grid::make(3)->schema([
                                TextInput::make('email_desa')
                                    ->label('Email Desa')
                                    ->email()
                                    ->maxLength(191)
                                    ->placeholder('contoh@desa.go.id'),

                                TextInput::make('telepon_desa')
                                    ->label('Nomor Telepon Desa')
                                    ->maxLength(50)
                                    ->placeholder('Contoh: 021-1234567 / 08xx-xxxx-xxxx'),

                                TextInput::make('website_desa')
                                    ->label('Website Desa')
                                    ->url()
                                    ->maxLength(191)
                                    ->placeholder('https://desa.go.id'),
                            ]),

                            Grid::make(3)->schema([
                                TextInput::make('nama_kecamatan')
                                    ->label('Nama Kecamatan')
                                    ->maxLength(191)
                                    ->placeholder('Contoh: Kec. Sukamakmur'),

                                TextInput::make('nama_kabupaten')
                                    ->label('Nama Kabupaten/Kota')
                                    ->maxLength(191)
                                    ->placeholder('Contoh: Kab. Sukaraya'),

                                TextInput::make('nama_provinsi')
                                    ->label('Nama Provinsi')
                                    ->maxLength(191)
                                    ->placeholder('Contoh: Jawa Tengah'),
                            ]),

                            Grid::make(3)->schema([
                                TextInput::make('kode_kecamatan')
                                    ->label('Kode Kecamatan')
                                    ->maxLength(50)
                                    ->placeholder('Contoh: 337201'),

                                TextInput::make('kode_kabupaten')
                                    ->label('Kode Kabupaten')
                                    ->maxLength(50)
                                    ->placeholder('Contoh: 3372'),

                                TextInput::make('kode_provinsi')
                                    ->label('Kode Provinsi')
                                    ->maxLength(50)
                                    ->placeholder('Contoh: 33'),
                            ]),
                        ]),

                        Section::make('Kontak Pemberitahuan')
                        ->schema([
                            Grid::make(3)->schema([
                                TextInput::make('nama_pemdes')
                                    ->label('Nama Pemerintah Desa')
                                    ->maxLength(191)
                                    ->placeholder('Nama pejabat pengirim pemberitahuan'),

                                TextInput::make('no_hp_pemdes')
                                    ->label('No. HP/WA')
                                    ->maxLength(50)
                                    ->placeholder('Contoh: 08xx-xxxx-xxxx'),

                                TextInput::make('jabatan_pemdes')
                                    ->label('Jabatan')
                                    ->maxLength(191)
                                    ->placeholder('Contoh: Sekretaris Desa'),
                            ]),
                        ]),
                    ])
                    ->columnSpan(2),

            ]);
}
}
