<?php

namespace App\Models;

use Spatie\Sluggable\HasSlug;
use Kyslik\ColumnSortable\Sortable;
use Spatie\Sluggable\SlugOptions;
use Illuminate\Database\Eloquent\Model;
use EloquentFilter\Filterable;

class Page extends Model
{
    use Sortable, HasSlug, Filterable;

    public $sortable = ['id', 'title', 'content', 'active', 'created_at', 'updated_at'];

    public $fillable = ['id', 'title', 'content', 'active', 'created_at', 'updated_at'];

    /**
     * Get the options for generating the slug.
     */
    public function getSlugOptions(): SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('title')
            ->saveSlugsTo('slug');
    }

    public function getCreatedAtAttribute($data) 
    {
        return date('d/m/Y h:m:s', strtotime($data));
    }

    public function getUpdatedAtAttribute($data) 
    {
        return date('d/m/Y h:m:s', strtotime($data));
    }
}