<?php

namespace App\Models;

use Kyslik\ColumnSortable\Sortable;
use Illuminate\Database\Eloquent\Model;
use EloquentFilter\Filterable;

class Feature extends Model
{
    use Sortable, Filterable;

    public $sortable = ['id', 'name', 'description', 'active', 'created_at', 'updated_at'];

    public $fillable = ['id', 'name', 'description', 'active'];

    public function options()
    {
        return $this->hasMany('App\Models\FeatureOption');
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