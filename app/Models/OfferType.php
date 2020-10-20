<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;
use EloquentFilter\Filterable;

class OfferType extends Model
{

    use Sortable, Filterable;

    public $sortable = ['name', 'color', 'active', 'created_at', 'modified_at'];

    public $fillable = ['name', 'color', 'active'];

    public function getColors()
    {
        return [
            'primary' => __('Primaria'),
            'secondary' => __('Secundária'),
            'danger' => __('Vermelha'),
            'light' => __('Branca'),
            'dark' => __('Preta'),
            'info' => __('Info'),
            'success' => __('Verde'),
        ];
    }

    public function scopeActive($query)
    {
        return $query;
        // return $query->where('active', true);
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