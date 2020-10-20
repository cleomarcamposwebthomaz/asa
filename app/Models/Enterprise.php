<?php

namespace App\Models;

use Spatie\Sluggable\HasSlug;
use Kyslik\ColumnSortable\Sortable;
use Spatie\Sluggable\SlugOptions;
use Illuminate\Database\Eloquent\Model;
use EloquentFilter\Filterable;

class Enterprise extends Model
{
    use Sortable, HasSlug, Filterable;

    public $sortable = ['id', 'name', 'active', 'created_at', 'updated_at'];

    public $fillable = [
        'id', 
        'state_id',
        'city_id',
        'name', 
        'description', 
        'active', 
        'published',
        'created_at', 
        'updated_at',
        'cep',
        'state_id',
        'city_id',
        'street',
        'number',
        'complement',
        'neighborhood',
    ];

    /**
     * Get the options for generating the slug.
     */
    public function getSlugOptions(): SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('name')
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

    public function photos()
    {
        return $this->hasMany('App\Models\EnterprisePhoto');
    }

}