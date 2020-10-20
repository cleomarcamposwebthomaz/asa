<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Sluggable\HasSlug;
use Kyslik\ColumnSortable\Sortable;
use Spatie\Sluggable\SlugOptions;
use EloquentFilter\Filterable;

class Advertiser extends Model
{
    use Sortable, HasSlug, Filterable;

    public $sortable = [
        'id', 
        'name', 
        'phone', 
        'active', 
        'created_at', 
        'updated_at'
    ];

    public $fillable = [
        'id', 
        'name', 
        'person_type', 
        'document', 
        'email', 
        'emails', 
        'phone', 
        'whatszap', 
        'facebook', 
        'instagram', 
        'twitter', 
        'linkedin', 
        'address', 
        'html', 
        'about', 
        'active', 
        'created_at', 
        'updated_at'
    ];

    /**
     * Get the options for generating the slug.
     */
    public function getSlugOptions() : SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('name')
            ->saveSlugsTo('slug');
    }

    public function properties() {
        return $this->hasMany(\App\Models\Property::class);
    }

}