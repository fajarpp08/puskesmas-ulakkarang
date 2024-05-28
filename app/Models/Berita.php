<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class Berita extends Model
{
    use HasFactory;
    use HasSlug;
    protected $guarded = [];
    protected $fillable = [
        'nama_berita',
        'deskripsi_berita',
        'gambar_berita',
        'slug',
    ];
    public function getSlugOptions(): SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('nama_berita')
            ->saveSlugsTo('slug');
    }
}
