<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Sluggable\HasSlug;
use Kyslik\ColumnSortable\Sortable;
use Spatie\Sluggable\SlugOptions;
use EloquentFilter\Filterable;

class Category extends Model
{
    use Sortable, HasSlug, Filterable;

    public $sortable = ['id', 'parent_id', 'name', 'active', 'created_at', 'updated_at'];

    public $fillable = ['id', 'parent_id', 'name', 'content', 'active', 'show_menu', 'image', 'created_at', 'updated_at'];

    /**
     * Get the options for generating the slug.
     */
    public function getSlugOptions(): SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('name')
            ->saveSlugsTo('slug');
    }

    public function scopeActive($query)
    {
        return $query->where('active', true);
    }

    public function properties()
    {
        return $this->hasMany('App\\Models\\Property');
    }

    public function father()
    {
        return $this->belongsTo(Category::class, 'parent_id');
    }

    public function children()
    {
        return $this->hasMany(Category::class, 'parent_id');
    }
}