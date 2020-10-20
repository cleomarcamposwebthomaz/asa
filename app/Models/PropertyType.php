<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Sluggable\HasSlug;
use Kyslik\ColumnSortable\Sortable;
use Spatie\Sluggable\SlugOptions;
use EloquentFilter\Filterable;

class PropertyType extends Model
{
    use Sortable, HasSlug, Filterable;

    public $sortable = ['id', 'name', 'active', 'created_at', 'updated_at'];

    public $fillable = ['id', 'name', 'active', 'created_at', 'updated_at'];

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
        return $query;
        // return $query->where('active', true);
    }

    // public function properties() {
    // return $this->hasMany(Category::class, 'parent_id');
    // }

    public function getCreatedAtAttribute($data) 
    {
        return date('d/m/Y h:m:s', strtotime($data));
    }

    public function getUpdatedAtAttribute($data) 
    {
        return date('d/m/Y h:m:s', strtotime($data));
    }    
}