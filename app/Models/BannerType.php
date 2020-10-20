<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;
use EloquentFilter\Filterable;

class BannerType extends Model
{
    use Sortable, Filterable;

    public $sortable = ['name', 'description', 'active', 'created_at', 'modified_at'];

    public $fillable = ['name', 'description', 'active'];
}