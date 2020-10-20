<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PropertyVisit extends Model
{

    public function properties()
    {
        return $this->belongsTo('App\Models\Property');
    }

}