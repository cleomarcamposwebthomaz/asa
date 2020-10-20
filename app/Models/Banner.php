<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;
use EloquentFilter\Filterable;
use QCod\ImageUp\HasImageUploads;

class Banner extends Model
{
    use Sortable, Filterable, HasImageUploads;

    public $sortable = ['banner_type_id', 'name', 'image', 'active', 'created_at', 'modified_at'];

    public $fillable = ['banner_type_id', 'name', 'description', 'image', 'image_mobile', 'active'];

    // assuming `users` table has 'cover', 'avatar' columns
    // mark all the columns as image fields 
    protected static $imageFields = [
        'image' => [
            'path' => 'banner',
        ],
        'image_mobile' => [
            'path' => 'banner',
        ],
    ];

    public function scopeActive($query)
    {
        return $query->where('banners.active', true);
    }

    public function type()
    {
        return $this->belongsTo('App\Models\BannerType', 'banner_type_id');
    }
}