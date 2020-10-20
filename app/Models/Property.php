<?php

namespace App\Models;

use EloquentFilter\Filterable;
use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;
use QCod\ImageUp\HasImageUploads;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class Property extends Model
{
    use Sortable, HasSlug, HasImageUploads, Filterable;

    public $sortable = ['id', 'name', 'active', 'created_at', 'updated_at'];

    public $fillable = [
        'id',
        'advertiser_id',
        'broker_id',
        'offer_type_id',
        'property_type_id',
        'enterprise_id',
        'slug',
        'name',
        'price',
        'price_promotional',
        'description',
        'internal_observation',
        'active',
        'fatured',
        'tags',
        'bathroom',
        'bedrooms',
        'property_size',
        'year',
        'suites',
        'garages',
        'video_url',
        'cep',
        'state_id',
        'city_id',
        'street',
        'number',
        'complement',
        'neighborhood',
    ];

    // assuming `users` table has 'cover', 'avatar' columns
    // mark all the columns as image fields
    protected static $imageFields = [
        'image' => [
            'path' => 'property',
        ],
    ];

    protected $appends = array('video_embed');

    public function getPriceAttribute($value)
    {
        return 'R$ ' . number_format($value, 2, ',', '.');
    }

    public function getVideoEmbedAttribute()
    {
        $id = @end(explode('v=', $this->attributes['video_url']));

        if (!empty($id)) {
            return 'https://youtube.com/embed/' . $id;
        }

        return '';
    }

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

    public function scopeFatured($query)
    {
        return $query->where('fatured', true);
    }

    public function enterprise()
    {
        return $this->belongsTo('App\Models\Enterprise');
    }

    public function broker()
    {
        return $this->belongsTo('App\Models\Broker');
    }

    public function city()
    {
        return $this->belongsTo('App\Models\City');
    }

    public function type()
    {
        return $this->belongsTo('App\Models\PropertyType', 'property_type_id');
    }

    public function brokers()
    {
        return $this->belongsToMany('App\Models\Broker');
    }

    public function categories()
    {
        return $this->belongsToMany('App\Models\Category');
    }

    public function offerTypes()
    {
        return $this->belongsToMany('App\Models\OfferType');
    }

    public function features()
    {
        return $this->belongsToMany('App\Models\Feature');
    }

    public function photos()
    {
        return $this->hasMany('App\Models\PropertyPhoto');
    }

    public function address()
    {
        return $this->hasOne('App\Models\PropertyAddress');
    }

    public function visits()
    {
        return $this->hasMany('App\Models/PropertyVisit');
    }
}