<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    protected $fillable = [
        'id','file_title','file_overview', 'file_thumbnail', 'file_category', 'file_year', 'file_name', 'file_path'
    ];
}
