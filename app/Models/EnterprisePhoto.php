<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;
use EloquentFilter\Filterable;
use QCod\ImageUp\HasImageUploads;

class EnterprisePhoto extends Model
{
    use Sortable, Filterable, HasImageUploads;

    public $sortable = ['name', 'image', 'active', 'created_at', 'modified_at'];

    public $fillable = ['enterprise_id', 'name', 'image', 'active', 'sort'];

    // assuming `users` table has 'cover', 'avatar' columns
    // mark all the columns as image fields 
    protected static $imageFields = [
        'image' => [
            'path' => 'enterprise-photo',
        ],
    ];

    public function scopeActive($query)
    {
        return $query->where('active', true);
    }
}