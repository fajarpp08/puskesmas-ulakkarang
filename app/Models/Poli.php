<?php

namespace App\Models;

use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Poli extends Model
{
    use HasFactory;
    use HasSlug;
    protected $guarded = [];
    protected $fillable = [
        'nama_poli',
        'deskripsi_poli',
        'gambar_poli',
        'slug',
    ];
    public function getSlugOptions(): SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('nama_poli')
            ->saveSlugsTo('slug');
    }
}
