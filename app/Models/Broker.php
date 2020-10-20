<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;
use EloquentFilter\Filterable;
use QCod\ImageUp\HasImageUploads;

class Broker extends Model
{
    use Sortable, Filterable, HasImageUploads, HasSlug;

    public $sortable = [
        'id',
        'name',
        'image',
        'active',
        'created_at',
        'updated_at'
    ];

    public $fillable = [
        'id',
        'name',
        'email',
        'emails',
        'phone',
        'phones',
        'whatsapp',
        'facebook',
        'instagram',
        'twitter',
        'linkedin',
        'address',
        'about',
        'active',
        'image',
        'show_phone',
        'show_whatsapp'
    ];

    // assuming `users` table has 'cover', 'avatar' columns
    // mark all the columns as image fields 
    protected static $imageFields = [
        'image' => [
            'path' => 'broker',
        ]
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

    public function scopeActive($query)
    {
        return $query->where('active', true);
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