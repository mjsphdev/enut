<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ImageContent extends Model
{
    protected $fillable = [
        'image_title', 'image_subtitle', 'image_type', 'image_slug', 'image_filename', 'status'
    ];

}
