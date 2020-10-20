<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;
use EloquentFilter\Filterable;

class FeatureOption extends Model
{
    use Sortable, Filterable;

    public $sortable = ['id', 'feature_id', 'name', 'active', 'created_at', 'updated_at'];

    public $fillable = ['id', 'feature_id', 'name', 'active'];


    function feature()
    {
        return $this->belongsTo('App\Models\Feature');
    }

}