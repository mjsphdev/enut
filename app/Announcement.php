<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Announcement extends Model
{
    protected $fillable = [
        'id','title', 'post_validity', 'content', 'image'
    ];
}
