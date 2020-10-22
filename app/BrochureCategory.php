<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BrochureCategory extends Model
{
    protected $fillable = [
        'id','brochure_year', 'brochure_thumbnail'
    ];
}
