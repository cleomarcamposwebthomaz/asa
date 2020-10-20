<?php

namespace App\Models;

use EloquentFilter\Filterable;
use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class PropertyContact extends Model
{
    use Sortable, Filterable;

    public $sortable = ['property_id', 'broker_id', 'name', 'email', 'phone', 'message', 'created_at', 'modified_at'];

    public $fillable = ['property_id', 'broker_id', 'name', 'email', 'phone', 'message'];

    public function property()
    {
        return $this->belongsTo('App\Models\Property');
    }

    public function broker()
    {
        return $this->belongsTo('App\Models\Broker');
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