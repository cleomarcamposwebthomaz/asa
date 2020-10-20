<?php

namespace App\Models;

use EloquentFilter\Filterable;
use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class Setting extends Model
{
    use Sortable, Filterable;

    public $sortable = ['id', 'name', 'label', 'public_name', 'value', 'created_at', 'updated_at'];

    public $fillable = ['id', 'name', 'label', 'public_name', 'value', 'created_at', 'updated_at'];

    public function modelFilter()
    {
        return $this->provideFilter(\App\ModelFilters\AdminFilters\SettingFilter::class);
    }
}