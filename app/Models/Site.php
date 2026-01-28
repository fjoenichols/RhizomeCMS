<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Site extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id', 'name', 'slug', 'description', 'theme_color',
        'hero_title', 'hero_subtitle', 'cta_text', 'business_phone'
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function pages()
    {
        return $this->hasMany(Page::class);
    }

    protected static function booted()
    {
        static::created(function ($site) {
            $site->pages()->create([
                'title' => 'Home',
                'slug' => 'home',
                'content' => 'Welcome to your new site! This page was automatically generated to help you get started. You can edit this content anytime from your dashboard.',
            ]);
        });
    }
}
