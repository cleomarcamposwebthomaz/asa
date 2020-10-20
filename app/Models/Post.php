<?php

namespace App\Models;

use Spatie\Sluggable\HasSlug;
use Kyslik\ColumnSortable\Sortable;
use Spatie\Sluggable\SlugOptions;
use Illuminate\Database\Eloquent\Model;
use EloquentFilter\Filterable;
use QCod\ImageUp\HasImageUploads;

class Post extends Model
{
    use Sortable, HasSlug, Filterable, HasImageUploads;

    public $sortable = ['id', 'title', 'image', 'active', 'created_at', 'updated_at'];

    public $fillable = ['id', 'title', 'short_description', 'content', 'image', 'active', 'created_at', 'updated_at'];

    // assuming `users` table has 'cover', 'avatar' columns
    // mark all the columns as image fields 
    protected static $imageFields = [
        'image' => [
            'path' => 'posts',
        ],
    ];

    /**
     * Get the options for generating the slug.
     */
    public function getSlugOptions(): SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('title')
            ->saveSlugsTo('slug');
    }

    public function scopeActive($query)
    {
        return $query->where('posts.active', true);
    }
}