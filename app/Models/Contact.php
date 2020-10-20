<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;
use EloquentFilter\Filterable;

class Contact extends Model
{
    use Sortable, Filterable;

    public $sortable = ['id', 'name', 'subject', 'phone', 'email', 'message', 'is_read', 'created_at'];

    public $fillable = ['id', 'name', 'subject', 'phone', 'email', 'message', 'is_read'];

    public function getCreatedAtAttribute($data) 
    {
        return date('d/m/Y h:m:s', strtotime($data));
    }

    public function getUpdatedAtAttribute($data) 
    {
        return date('d/m/Y h:m:s', strtotime($data));
    }
}