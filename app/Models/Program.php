<?php

namespace App\Models;

use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Program extends Model
{
    use HasFactory;
    use HasSlug;
    protected $guarded = [];
    protected $fillable = [
        'nama_program',
        'deskripsi_program',
        'gambar_program',
        'tanggal_mulai',
        'tanggal_akhir',
        'lokasi_program',
        'slug',
    ];
    public function getSlugOptions(): SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('nama_program')
            ->saveSlugsTo('slug');
    }
}