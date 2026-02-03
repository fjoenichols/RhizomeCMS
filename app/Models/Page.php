<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    protected $fillable = [
        'site_id', 
        'title', 
        'slug', 
        'content', 
        'hero_subtitle', 
        'hero_image', 
        'hero_cta_text', 
        'hero_cta_link', 
        'about_text',
        'core_values',
        'features',
    ];

    protected $casts = [
        'core_values' => 'array',
        'features' => 'array',
    ];

    public function site()
    {
        return $this->belongsTo(Site::class);
    }
}
