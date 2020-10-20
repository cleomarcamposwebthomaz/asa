<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;
use EloquentFilter\Filterable;

class City extends Model
{
    use Sortable, Filterable;

    public $sortable = ['state_id', 'name', 'active', 'created_at', 'modified_at'];

    public $fillable = ['state_id', 'name', 'active'];

    public function state()
    {
        return $this->belongsTo('App\Models\State');
    }

    public function properties()
    {
        return $this->hasMany('App\Models\Property');
    }
}