<?php

namespace App\Models;

use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Pengumuman extends Model
{
    use HasFactory;
    use HasSlug;
    protected $table = 'pengumuman';
    protected $guarded = [];
    protected $fillable = [
        'nama_pengumuman',
        'deskripsi_pengumuman',
        'tanggal_pengumuman',
        'gambar_pengumuman',
        'lama_pengumuman',
        'slug',
    ];
    public function getSlugOptions(): SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('nama_pengumuman')
            ->saveSlugsTo('slug');
    }
}
