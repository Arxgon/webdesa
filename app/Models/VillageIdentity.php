<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class VillageIdentity extends Model implements HasMedia
{

    use InteractsWithMedia;

    protected $fillable = [
        'nama_desa','kode_desa','kode_pos','kepala_desa','alamat_kantor',
        'email_desa','telepon_desa','website_desa',
        'nama_kecamatan','nama_kabupaten','nama_provinsi',
        'kode_kecamatan','kode_kabupaten','kode_provinsi',
        'nama_pemdes','no_hp_pemdes','jabatan_pemdes',
    ];

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('logo')->singleFile();
        $this->addMediaCollection('office_photo')->singleFile();
    }

    public function registerMediaConversions(Media $media = null): void
    {
        $this->addMediaConversion('thumb')->width(400)->height(300)->nonQueued();
        $this->addMediaConversion('square')->fit('crop', 512, 512)->nonQueued();
    }

}
