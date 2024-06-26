<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class SectionArticle extends Model
{
    use HasFactory;
    protected $guarded = [];

    protected static function boot() {
        parent::boot();

        static::creating(function ($article) {
            if (!$article->slug) {
                $article->slug = Str::slug($article->title, '-');
            }
        });
    }
}
