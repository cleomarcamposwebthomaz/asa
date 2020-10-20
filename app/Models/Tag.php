<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;
use EloquentFilter\Filterable;

class Tag extends Model
{
    use Sortable, Filterable;

    public $sortable = ['name','active', 'created_at', 'modified_at'];

    public $fillable = ['name', 'active'];

}